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
		$this->loadmodel('Request_detailses');
		$this->loadmodel('Product_detailses');
		$this->loadComponent('MakeId9');

		$session = $this->request->session();
		if (!$session->read('loginFlg')) {
			$this->redirect(['controller' => 'login']);
		}
    }



	public function index(){
      $query = $this->Facilities->find()
      ->select(['id','name','address'])
      ->where(['facility_classes_id ='=>2]);
      $facilities = $query->all()->ToArray();
      $jsonResults = json_encode($facilities);
      $this->set(compact('facilities'));
	  $_SESSION['select_flg'] = 0;
	  $_SESSION['create_flg'] = 0;
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
			$this->Flash->error(__('依頼データが送信されました。'));
			unset($_SESSION['facility']);
			unset($_SESSION['request']);
			unset($_SESSION['select_flg']);
			unset($_SESSION['create_flg']);
			unset($_SESSION['p_detail']);
			exit();

		}
	}



	public function list(){
		$query = $this->Requests->find()
		->select(['id','F_moto_id','title','facilities.name'])
		->join([
			'table' => 'facilities',
			'type' => 'LEFT',
			'conditions' => 'facilities.id = Requests.F_moto_id'
		]);

		$reqs = $query->all()->ToArray();
		$this->set(compact('reqs'));
	}


		public function detail(){
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

				if (isset($_POST['order'])) {
					//本番稼働時には下記のURLをトップページのものへ変更する
					header( "Location: http://localhost/silver/" ) ;
					$query = $this->Requests->query();
					$query->update()
				  ->set(['ju_flg' => 1])
				  ->where(['id' => $_SESSION['id']])
				  ->execute();


				}
			}


		}


}
