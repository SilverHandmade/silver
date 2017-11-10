<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class RegistController extends AppController
{

    public function add() {
	    if($this->request->is('post')) {
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
    }

    public function index()
    {
      //facilities->nameの値を取得
      $facname = $this->facilities->find()
      ->select(['name']);
      $results = $facname->toArray();
      $this->set(compact('results'));

      $user = $this->users->find()
      ->select(['id','email','name','facilities_id','facility_classes_id','hurigana','password']);
      $userarray = $user->toArray();
      $this->set(compact('userarray'));

      $postname = $_POST['name'];
			$posthurigana  = $_POST['hurigana'];
			$postmail  = $_POST['email'];
			$postremail  = $_POST['reemail'];
			$postpass  = $_POST['password'];
			$postrepass  = $_POST['repassword'];

      $query = $this->users->query();
      $query->insert([
        'id','email','name','facilities_id','facility_classes_id','hurigana','password'])
      ->values([
        'id' => 'test',
        'email' => $postmail,
        'name' => $postname,
        'facilities_id' => '171001',
        'facility_classes_id' => '1',
        'hurigana' => $posthurigana,
        'password' => $postpass
      ])
      ->execute();
    }
}
