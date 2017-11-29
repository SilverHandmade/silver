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
        $this->loadmodel('Products');
        $this->loadmodel('Facilities');
		$this->loadmodel('Requests');
		$this->loadmodel('Users');
		$this->loadmodel('Request_detailses');
		$this->loadmodel('Product_detailses');
		$this->loadComponent('MakeId9');

		$session = $this->request->session();
		if (!$session->read('loginFlg')) {
			$this->redirect(['controller' => 'login']);
		}
    }



	public function index(){

	$query = $this->Users->find()
	->select(['id','facility_classes_id'])
	->where(['id' => $_SESSION['Auth']['User']['id']]);

	$user_faci = $query->all()->ToArray();
	$this->set(compact('user_faci'));




      $query = $this->Facilities->find()
      ->select(['id','name','address'])
      ->where(['facility_classes_id ='=>2]);
      $facilities = $query->all()->ToArray();
      $jsonResults = json_encode($facilities);
      $this->set(compact('facilities'));
	  $_SESSION['select_flg'] = 0;
	  $_SESSION['create_flg'] = 0;
	  unset($_SESSION['edit_flg']);
	  unset($_SESSION['req_edit']);
	  unset($_SESSION['p_detail']);
    }


    public function create()
    {
		if ($this->request->is('post')){
			if ($_SESSION['select_flg'] == 0) {
				//セッションに依頼先データを保存する
				$_SESSION['facility']['facility_id'] = $_POST['facility_id'];
				$_SESSION['facility']['facility_name'] = $_POST['facility_name'];
				$_SESSION['facility']['facility_address'] = $_POST['facility_address'];
				$_SESSION['select_flg'] = 1;
			}

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
				  if(!next($results)){
					// 一致しなかった場合
					$uri = $_SERVER['HTTP_REFERER'];
					//一つ前の画面へ遷移
					header( "Location: ".$uri ) ;
					$this->Flash->error(__('ワークショップIDが間違っています。'));
					exit;
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


			echo "データが送信されました";
			//本番稼働時には下記のURLをトップページのものへ変更する
			header( "Location: http://localhost/silver/" ) ;
			$this->Flash->success(__('依頼データが送信されました。'));
			unset($_SESSION['facility']);
			unset($_SESSION['request']);
			unset($_SESSION['select_flg']);
			unset($_SESSION['create_flg']);
			unset($_SESSION['p_detail']);
			exit();

		}
	}



	public function list(){
		$query = $this->Users->find()
		->select(['id','facilities_id','facility_classes_id'])
		->where(['id' => $_SESSION['Auth']['User']['id']]);

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
		->where(['ju_flg IS NULL','kan_flg' => 0,'Requests.Del_flg' => 0,'F_saki_id' => $f_saki]);

		$reqs = $query->all()->ToArray();
		$this->set(compact('reqs'));
		}
	}


		public function detail(){

			$query = $this->Users->find()
			->select(['id','facility_classes_id'])
			->where(['id' => $_SESSION['Auth']['User']['id']]);

			$user_faci = $query->all()->ToArray();
			$this->set(compact('user_faci'));


			if (isset($_POST['order'])) {
				$query = $this->Requests->query();
				$query->update()
			  ->set(['ju_flg' => 1])
			  ->where(['id' => $_SESSION['id']])
			  ->execute();
			  //本番稼働時には下記のURLをトップページのものへ変更する
			  header( "Location: http://localhost/silver/" );
			  unset($_SESSION['id']);
			  $this->Flash->success('依頼を受けました。');
			  exit();
			}

			if ($this->request->is('post')){

				//施設情報の取得
				$query = $this->Facilities->find()
				->where(['id ='=>$_POST['request_moto_id']]);
				$faci_info = $query->all()->ToArray();
				$this->set(compact('faci_info'));

				//依頼情報の取得
				$query = $this->Requests->find()
				->where(['id ='=>$_POST['request_id']]);
				$req_info = $query->all()->ToArray();
				$this->set(compact('req_info'));

				//ワークショップの取得
				$query = $this->Request_detailses->find()
				->where(['request_id ='=>$_POST['request_id']]);
				$pdt_info = $query->all()->ToArray();
				$this->set(compact('pdt_info'));
				$_SESSION['id']=$req_info[0]['id'];

			}


			//TOPページから詳細へ飛んだ場合の処理
			$get_id = $this->request->getParam('id');
			if ($get_id != "") {
				//依頼情報の取得
				$query = $this->Requests->find()
				->where(['id'=>$get_id]);
				$getreq_info = $query->all()->ToArray();
				$this->set(compact('getreq_info'));

				//施設情報の取得
				$query = $this->Facilities->find()
				->where(['id ='=>$getreq_info[0]['F_moto_id']]);
				$faci_info = $query->all()->ToArray();
				$this->set(compact('faci_info'));

				//依頼情報の取得
				$query = $this->Requests->find()
				->where(['id ='=>$getreq_info[0]['id']]);
				$req_info = $query->all()->ToArray();
				$this->set(compact('req_info'));

				//ワークショップの取得
				$query = $this->Request_detailses->find()
				->where(['request_id ='=>$getreq_info[0]['id']]);
				$pdt_info = $query->all()->ToArray();
				$this->set(compact('pdt_info'));
				$_SESSION['id']=$req_info[0]['id'];
			}


		}


		public function select(){

			$query = $this->Users->find()
			->select(['id','facilities_id'])
			->where(['id'=>$_SESSION['Auth']['User']['id']]);
			$loginuser = $query->all()->ToArray();
			$this->set(compact('loginuser'));

			$query = $this->Requests->find()
			->select(['id','F_moto_id','F_saki_id','title','ju_flg','kan_flg','Requests.Del_flg','facilities.name'])
			->join([
				'table' => 'facilities',
				'type' => 'LEFT',
				'conditions' => 'facilities.id = Requests.F_saki_id'])
			->where(['ju_flg IS NULL','kan_flg' => 0,'Requests.Del_flg' => 0,'F_moto_id' => $loginuser[0]['facilities_id']]);
			$reqlist = $query->all()->ToArray();
			$this->set(compact('reqlist'));

		}


		public function edit(){
			$_SESSION['req_flg'] = 0;

			if (isset($_POST['Reqcancelbtn'])) {
				$query = $this->Requests->query();
				$query->update()
			  ->set(['Del_flg' => 1])
			  ->where(['id' => $_SESSION['sel_id']])
			  ->execute();
			  //本番稼働時には下記のURLをトップページのものへ変更する
			  header( "Location: http://localhost/silver/" );
			  unset($_SESSION['sel_id']);
			  $this->Flash->success('依頼をキャンセルしました。');
			  exit();
			}

			if (isset($_POST['nextbtn'])) {
				$_SESSION['req_edit']['title'] = $_POST['requestselT_con'];
				$_SESSION['req_edit']['number'] = $_POST['requestselN_con'];
				$_SESSION['req_edit']['date'] = $_POST['selrequestD_con'];
			  //本番稼働時には下記のURLをトップページのものへ変更する
			  header( "Location: http://localhost/silver/request/edit_ploof/" );
			  exit();
			}




			if ($this->request->is('post')){
				$query = $this->Requests->find()
				->where(['id'=> $_POST['selrequest_id']]);
				$edit_req = $query->all()->ToArray();
				$this->set(compact('edit_req'));
				$_SESSION['sel_id'] = $edit_req[0]['id'];

			}


		}


		public function editploof(){
			$_SESSION['edit_flg'] = 1;
		}


}
