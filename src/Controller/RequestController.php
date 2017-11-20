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
			//wsidが入力されているとき
			if (isset($_POST['wsID_con'])) {
				$wsid = $_POST['wsID_con'];
			}else{
				$wsid = null;
			}


			//ID連番
			$req_id=$this->MakeId9->id9('req');

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

		}


}
