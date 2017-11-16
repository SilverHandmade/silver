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

		if ($this->request->is('post')){
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
	}


}
