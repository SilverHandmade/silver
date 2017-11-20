<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class RegistController extends AppController
{

    public function add() {
	    if($this->request->is('get')) {
	        if($this->NewRegist->save($this->request->data)) {
	            $this->Session->setFlash('入力完了');
	        	$this->redirect(array('action'=>'lists'));
	        }
	        else {
	            $this->Session->setFlash('入力失敗');
	        }
	    }
	}

    public function initialize()
    {
      parent::initialize();
      $this ->loadmodel('users');
      $this ->loadmodel('facilities');
	  $this ->loadmodel('facility_classes');
      $this->loadComponent('PassHash');
    }

    public function index()
    {
      //facilities->nameの値を取得
      $facname = $this->facilities->find('all');
      $results = $facname->toArray();
      $this->set(compact('results'));

	  $fClass = $this->facility_classes->find('all');
      $fClassArray = $fClass->toArray();
      $this->set(compact('fClassArray'));


      //usersのデータベースを取得
      $user = $this->users->find('all');
      $userarray = $user->toArray();
      $this->set(compact('userarray'));

      if($this->request->is('post')) {

        $postname = $_POST['name'];
  		$posthurigana  = $_POST['hurigana'];
  		$postmail  = $_POST['email'];
  		$postremail  = $_POST['reemail'];
  		$postpass  = $this->PassHash->hash($_POST['password']);
        $postfacilitie = $_POST['facilities'];
		$postfClassId = $_POST['fClassId'];
  		$postrepass  = $_POST['repassword'];
    }
  }
  public function confirm(){

	  //facilities->nameの値を取得
      $facname = $this->facilities->find('all');
      // ->select(['name']);
      $results = $facname->toArray();
      $this->set(compact('results'));

	  $fClass = $this->facility_classes->find('all');
      $fClassArray = $fClass->toArray();
      $this->set(compact('fClassArray'));


      //usersのデータベースを取得
      $user = $this->users->find('all');
      $userarray = $user->toArray();
      $this->set(compact('userarray'));

	  if ($this->request->is('post')) {
		  $postname = $_POST['name'];
		  $posthurigana  = $_POST['hurigana'];
		  $postmail  = $_POST['email'];
		  $postpass  = $this->PassHash->hash($_POST['password']);
		  $postfacilitie = $_POST['facilities'];
		  $postfClassId = $_POST['fClassId'];

		  $query = $this->facilities->query();
  			$query->select(['name'])
			->where([' id'=>$postfacilitie]);
			$fnamearray = $query->toArray();
	        $this->set(compact('fnamearray'));

			if (!empty($_POST['flg'])) {
				$query = $this->users->query();
				$query->insert([
					'id','email','name','facilities_id','facility_classes_id','hurigana','password'
				])
				->values([
					'id' => '',
					'email' => $postmail,
					'name' => $postname,
					'facilities_id' => $postfacilitie,
					'facility_classes_id' => $postfClassId,
					'hurigana' => $posthurigana,
					'password' => $postpass
				])
				->execute();
				$this->redirect(['controller' => 'login', 'action' => 'index']);
			}
	  }
  }

}
