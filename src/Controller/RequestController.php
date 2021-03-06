<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;

class RequestController extends AppController
{

	public function initialize()
	{

		parent::initialize();
		// ログイン確認
		if (empty($this->Userinfo->getuser())) {
			$this->redirect(['controller' => 'login', 'action' => 'index']);
		}
		$this->loadmodel('Products');
		$this->loadmodel('Facilities');
		$this->loadmodel('Requests');
		$this->loadmodel('Users');
		$this->loadmodel('Request_detailses');
		$this->loadmodel('Product_detailses');
		$this->loadmodel('request_messages');
		$this->loadComponent('MakeId9');
		//仮
		$this->loadModel('witses');
		$this->loadModel('wits_messages');

		//

		//requestページはキャッシュさせない
		header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		header( 'Last-Modified:' . gmdate( 'D, d M Y H:i:s' ) . 'GMT' );
		header( 'Cache-Control: no-store, no-cache, must-revalidate' );
		header( 'Cache-Control: post-check=0, pre-check=0', false );
		header( 'Pragma: no-cache' );
		//ここまで
		if (empty($this->Userinfo->getuser())) {
			$this->redirect(['controller' => 'login', 'action' => 'index']);
		}
	}



	public function index(){
		$user = $this->Userinfo->getuser();
		$query = $this->Users->find()
		->select(['id','facility_classes_id'])
		->where(['id' => $user['id']]);

		$user_faci = $query->all()->ToArray();
		$this->set(compact('user_faci'));
		$query = $this->Facilities->find()
		->select(['id','name','address'])
		->where(['facility_classes_id ='=>2,'Del_flg ='=>0]);
		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('search'))) {
				$query->where(['name LIKE' => '%' . $this->request->getData('search') . '%'])
				->orWhere(['address LIKE' => '%' . $this->request->getData('search') . '%'])
				->where(['facility_classes_id ='=>2,'Del_flg ='=>0]);
			}

		}
		$facilities = $query->ToArray();
		$this->set(compact('facilities'));
		if ($this->request->is('ajax')) {
			$this->render('/Element/Request/reqIndex');
		}
		$_SESSION['select_flg'] = 0;
		$_SESSION['create_flg'] = 0;
		unset($_SESSION['req_edit']);
		unset($_SESSION['p_detail']);
		unset($_SESSION['sel_id']);
		unset($_SESSION['facility']);
		unset($_SESSION['request']);
	}


	public function create()
	{
		$get_id = $this->request->getQuery('id');

		$query = $this->Products->find();
		$Products = $query->all()->ToArray();
		$this->set(compact('Products'));

		if ($_SESSION['select_flg'] == 0) {
			//セッションに依頼先データを保存する
			$query = $this->Facilities->find()
			->select(['id','name','address'])
			->where(['id ='=>$get_id]);
			$facilities = $query->all()->ToArray();
			$this->set(compact('facilities'));
			$_SESSION['facility']['facility_id'] = $facilities[0]['id'];
			$_SESSION['facility']['facility_name'] = $facilities[0]['name'];
			$_SESSION['facility']['facility_address'] = $facilities[0]['address'];
			$_SESSION['select_flg'] = 1;
		}

	}

	public function proof(){

		$query = $this->Products->find()
		->select(['id']);
		$results = $query->all()->ToArray();
		$jsonResults = json_encode($results);
		$this->set(compact('results'));
		$_SESSION['create_flg'] = 1;


		if (isset($_POST['requestT'])){
			$_SESSION['request']['title'] = $_POST['requestT'];
			$_SESSION['request']['number'] = $_POST['requestN'];
			$_SESSION['request']['date'] = $_POST['requestD'];
			if ($_SESSION['request']['wsid'] = $_POST['wsID']) {
				if ($_SESSION['request']['wsid'] != "") {
					foreach ($results as $value) {
						$value = preg_replace('/[^0-9]/', '', $value);
						if ($_SESSION['request']['wsid'] === $value) {
							$query = $this->Product_detailses->find()
							->where(['product_id ='=> $value]);
							$p_detail = $query->ToArray();
							$this->set(compact('p_detail'));
							$_SESSION['p_detail'] = $p_detail;
							break;
						}
					}
				}
			}
		}

		//確定ボタンが押されたとき
		if (isset($_POST['ok'])) {

			//ID連番作成
			$req_id=$this->MakeId9->id9('req');

			//wsidが入力されているとき
			if (isset($_POST['wsID_con'])) {
				$wsid = $_POST['wsID_con'];
				$i = 0;
				foreach ($_SESSION['p_detail'] as $dt) {
					$ren = $dt['ren'];
					$description = $dt['description'];
					$photo = $dt['photo_url'];
					$query = $this->Request_detailses->query();
					$query->insert(['request_id','ren','description','photo_url'])
					->values([
						'request_id' => $req_id,
						'ren' => $ren,
						'description' => $description,
						'photo_url' => $photo
					])
					->execute();
				}
			}else{
				$wsid = null;
			}

			$moto_id = $_SESSION['Auth']['User']['facilities_id'];
			$saki_id = $_SESSION['facility']['facility_id'];
			$title = $_POST['requestT_con'];
			$title = htmlentities($title);
			$kosu = $_POST['requestN_con'];
			$now_date = date("Y/m/d");
			$to_date = $_POST['requestD_con'];
			$query = $this->Requests->query();
			$query->insert(['id','F_moto_id', 'F_saki_id','product_id','title','From_date','To_date','su'])
			->values([
				'id' => $req_id,
				'F_moto_id' => $moto_id,
				'F_saki_id' => $saki_id,
				'product_id' => $wsid,
				'title' => $title,
				'From_date' => $now_date,
				'To_date' => $to_date,
				'su' => $kosu
			])
			->execute();

			//nu
			//header( 'Location: http://'.$_SERVER['HTTP_HOST'] ) ;
			$this->redirect(['controller'=>'TopPage', 'action' => 'index']);
			$this->Flash->success(__('依頼データが送信されました。'));
			unset($_SESSION['facility']);
			unset($_SESSION['request']);
			unset($_SESSION['select_flg']);
			unset($_SESSION['p_detail']);
		}
	}


	public function lists(){
		$user = $this->Userinfo->getuser();
		if ($user['facility_classes_id'] == '9') {
			$this->redirect(['controller' => 'TopPage']);
		}

		$query = $this->Users->find()
		->select(['id','facilities_id','facility_classes_id'])
		->where(['id' => $user['id']]);

		$user_faci = $query->all()->ToArray();
		$this->set(compact('user_faci'));
		$f_saki = $user_faci[0]['facilities_id'];


		if ($user_faci[0]['facility_classes_id'] == 2) {
			$query = $this->Requests->find()
			->select(['id','F_moto_id','F_saki_id','title','ju_flg','kan_flg','Requests.Del_flg','facilities.name'])
			->join([
				'table' => 'facilities',
				'type' => 'LEFT',
				'conditions' => ['facilities.id = Requests.F_moto_id']
				])
			->where(['kan_flg' => 0,'Requests.Del_flg' => 0,'F_saki_id' => $f_saki]);
			if ($this->request->is('ajax')) {
				if (!empty($this->request->getData('search'))) {
					$query->where(['title LIKE' => '%' . $this->request->getData('search') . '%'])
					->orWhere(['facilities.name LIKE' => '%' . $this->request->getData('search') . '%'])
					->where(['kan_flg' => 0,'Requests.Del_flg' => 0,'F_saki_id' => $f_saki]);
				}
			}
			$query->order(['From_date' => 'DESC']);
			$reqs = $query->ToArray();
			$this->set(compact('reqs'));
			if ($this->request->is('ajax')) {
				$this->render('/Element/Request/reqLigg');
			}

		}elseif ($user_faci[0]['facility_classes_id'] == 1) {
			$query = $this->Requests->find()
			->select(['id','F_moto_id','F_saki_id','title','ju_flg','kan_flg','Requests.Del_flg','facilities.name'])
			->join([
				'table' => 'facilities',
				'type' => 'LEFT',
				'conditions' => ['facilities.id = Requests.F_saki_id']
				])
			->where(['kan_flg' => 0,'Requests.Del_flg' => 0,'F_moto_id' => $f_saki]);

			if ($this->request->is('ajax')) {
				if (!empty($this->request->getData('search'))) {
					$query->where(['title LIKE' => '%' . $this->request->getData('search') . '%'])
					->orWhere(['facilities.name LIKE' => '%' . $this->request->getData('search') . '%'])
					->where(['kan_flg' => 0,'Requests.Del_flg' => 0,'F_moto_id' => $f_saki]);
				}

			}
			$query->order(['From_date' => 'DESC']);

			$reqs_hoiku = $query->all()->ToArray();
			$this->set(compact('reqs_hoiku'));

			if ($this->request->is('ajax')) {
				$this->render('/Element/Request/reqLihoiku');
			}

		}
	}


	public function detail(){

		$user = $this->Userinfo->getuser();
		$query = $this->Users->find()
		->select(['id','facility_classes_id'])
		->where(['id' => $user['id']]);

		$user_faci = $query->all()->ToArray();
		$this->set(compact('user_faci'));

		//依頼受注ボタンが押されたとき
		if (isset($_POST['order'])) {
			$query = $this->Requests->query();
			$query->update()
			->set(['ju_flg' => 1])
			->where(['id' => $_SESSION['id']])
			->execute();

			$this->redirect(['controller'=>'TopPage']);
			unset($_SESSION['id']);
			$this->Flash->success('依頼を受けました。');
		}

		//依頼完了ボタンが押されたとき
		if (isset($_POST['kanryo'])) {
			$query = $this->Requests->query();
			$query->update()
			->set(['kan_flg' => 1])
			->where(['id' => $_SESSION['id']])
			->execute();

			$this->redirect(['controller'=>'TopPage']);
			unset($_SESSION['id']);
			$this->Flash->success('依頼が完了されました。');

		}

		//TOPページから詳細へ飛んだ場合の処理
		$get_id = $this->request->getParam('id');

		//依頼情報の取得
		$query = $this->Requests->find()
		->where(['id'=>$get_id]);
		$req_info = $query->all()->ToArray();
		$this->set(compact('req_info'));

		//施設情報の取得
		if ($user['facility_classes_id'] == 2) {
			$query = $this->Facilities->find()
			->where(['id ='=>$req_info[0]['F_moto_id']]);
			$faci_moto_info = $query->all()->ToArray();
			$this->set(compact('faci_moto_info'));
		}else {
			$query = $this->Facilities->find()
			->where(['id ='=>$req_info[0]['F_saki_id']]);
			$faci_saki_info = $query->all()->ToArray();
			$this->set(compact('faci_saki_info'));
		}

		//ワークショップの取得
		$query = $this->Request_detailses->find()
		->where(['request_id ='=>$req_info[0]['id']]);
		$pdt_info = $query->all()->ToArray();
		$this->set(compact('pdt_info'));
		$_SESSION['id']=$req_info[0]['id'];
	}


	public function select(){
		$user = $this->Userinfo->getuser();
		$_SESSION['edit_flg'] = 0;
		unset($_SESSION['req_edit']);
		$query = $this->Users->find()
		->select(['id','facilities_id'])
		->where(['id'=>$user['id']]);
		$loginuser = $query->all()->ToArray();
		$this->set(compact('loginuser'));

		$query = $this->Requests->find()
		->select(['id','F_moto_id','F_saki_id','title','ju_flg','kan_flg','Requests.Del_flg','facilities.name'])
		->join([
			'table' => 'facilities',
			'type' => 'LEFT',
			'conditions' => 'facilities.id = Requests.F_saki_id'])
		->where(['ju_flg IS NULL','kan_flg' => 0,'Requests.Del_flg' => 0,'F_moto_id' => $loginuser[0]['facilities_id']]);
		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('search'))) {
				$query->where(['title LIKE' => '%' . $this->request->getData('search') . '%'])
				->orWhere(['facilities.name LIKE' => '%' . $this->request->getData('search') . '%'])
				->where(['ju_flg IS NULL','kan_flg' => 0,'Requests.Del_flg' => 0,'F_moto_id' => $loginuser[0]['facilities_id']]);
			}

		}else {
			$query->limit(20);
		}
		$query->order(['From_date' => 'DESC']);
		$reqlist = $query->all()->ToArray();
		$this->set(compact('reqlist'));

		$query = $this->Requests->find()
		->select(['id','F_moto_id','F_saki_id','title','ju_flg','kan_flg','Requests.Del_flg','facilities.name'])
		->join([
			'table' => 'facilities',
			'type' => 'LEFT',
			'conditions' => 'facilities.id = Requests.F_saki_id'])
		->where(['kan_flg' => 0,'Requests.Del_flg' => 0]);
		$alllist = $query->all()->ToArray();
		$this->set(compact('alllist'));

		if ($this->request->is('ajax')) {
			$this->render('/Element/Request/reqSelect');
		}
	}


	public function edit(){
		$_SESSION['dateCheck'] = 0;


		if (isset($_POST['Reqcancelbtn'])) {
			$query = $this->Requests->query();
			$query->update()
			->set(['Del_flg' => 1])
			->where(['id' => $_SESSION['sel_id']])
			->execute();

			$this->redirect(['controller'=>'TopPage']);
			unset($_SESSION['sel_id']);
			$this->Flash->success('依頼をキャンセルしました。');
		}

		if (isset($_POST['nextbtn'])) {
			$_SESSION['req_edit']['title'] = htmlentities($_POST['requestselT_con']);
			$_SESSION['req_edit']['number'] = $_POST['requestselN_con'];
			$_SESSION['req_edit']['date'] = $_POST['selrequestD_con'];

			if (isset($_POST['Dcheck'])) {
				$_SESSION['dateCheck'] = $_POST['Dcheck'];
			}

			//header( 'Location: http://'.$_SERVER['HTTP_HOST'].'/silver/request/edit_ploof/' );
			$this->redirect(['controller'=>'request','action'=>'edit_ploof']);

		}


		$get_id = $this->request->getParam('id');
		if ($get_id != ""){
			$query = $this->Requests->find()
			->where(['id'=> $get_id]);
			$edit_req = $query->all()->ToArray();
			$this->set(compact('edit_req'));
			$_SESSION['sel_id'] = $edit_req[0]['id'];
			$_SESSION['req_edit']['moto_date'] = date("Y-n-j", strtotime($edit_req[0]['To_date']));

		}
	}


	public function editploof(){
		$_SESSION['edit_flg'] = 1;
		//確定ボタンが押されたとき
		if (isset($_POST['edit_ok'])) {
			$edit_titleP = $_SESSION['req_edit']['title'];
			$edit_suP = $_SESSION['req_edit']['number'];
			$edit_dateP = $_POST['requestD_con'];
			$query = $this->Requests->query();
			$query->update()
			->set(['title' => $edit_titleP,
					 'su' => $edit_suP,
			 	 'To_date' => $edit_dateP])
			->where(['id' => $_SESSION['sel_id']])
			->execute();


			$this->redirect(['controller'=>'TopPage']);
			$this->Flash->success(__('データが更新されました。'));
			unset($_SESSION['facility']);
			unset($_SESSION['request']);
			unset($_SESSION['select_flg']);
			unset($_SESSION['p_detail']);
			unset($_SESSION['req_edit']);
			unset($_SESSION['dateCheck']);
			unset($_SESSION['sel_id']);

		}
	}

	public function message(){

		$user = $this->Userinfo->getuser();
		// if (empty($user)) {
		// 	$this->redirect(['controller' => 'login', 'action' => 'index', 'ref' => $this->name]);
		// }
		//依頼ID取得
		$get_id = $this->request->getParam('id');

		//依頼タイトル取得
		$query = $this->Requests->find()
		->select(['title'])
		->where(['id ='=>$get_id]);
		$request_info = $query->all()->ToArray();
		$this->set(compact('request_info'));

		//連番
		$query = $this->request_messages->find();
		$query->select(['ren' => $query->func()->max('ren')])
		->where(['request_id ='=>$get_id]);
		$maxRenArray = $query->all()->ToArray();
		$this->set(compact('maxRenArray'));

		if (isset($_POST['mes-submit'])) {
			$answertxt = $_POST['textarea'];
			$answertxt = htmlentities($answertxt);
			$userId = $user['id'];
			$nowdate = date("Y/m/d H:i:s");
			$incRen = $maxRenArray[0]['ren'] + 1;


			$query = $this->request_messages->query();
			$query->insert([
				'request_id','ren','user_id','message','transmit','Del_flg'
			])
			->values([
				'request_id' => $get_id,
				'ren' => $incRen,
				'user_id' => $userId,
				'message' => $answertxt,
				'transmit' => $nowdate,
				'Del_flg' => '0'
			])
			->execute();
			$this->redirect(['controller'=>'Request','action'=>'message','id'=>$get_id]);
			$this->Flash->success(__('データが送信されました。'));
		}


		//メッセージの取得
		$query = $this->request_messages->find()
		->where(['request_id'=> $get_id])
		->order(['ren' => 'DESC']);
		$message_array = $query->all()->ToArray();
		$this->set(compact('message_array'));


		$query = $this->request_messages->find()
		->select(['user_id','ren','message','users.name','facilities.name'])
		->join([
			'table' => 'users',
			'type' => 'INNER',
			'conditions' => 'user_id = users.id'])
		->join([
			'table' => 'facilities',
			'type' => 'INNER',
			'conditions' => 'facilities.id = users.facilities_id'])
		->where(['request_id' => $get_id])
		->order(['ren' => 'DESC']);
		$mes_namelist = $query->all()->ToArray();
		$this->set(compact('mes_namelist'));

	}

}
