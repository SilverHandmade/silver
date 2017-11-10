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
      $this->loadComponent('PassHash');
    }

    public function index()
    {
      //facilities->nameの値を取得
      $facname = $this->facilities->find()
      ->select(['name']);
      $results = $facname->toArray();
      $this->set(compact('results'));

      //usersのデータベースを取得
      $user = $this->users->find()
      ->select(['id','email','name','facilities_id','facility_classes_id','hurigana','password']);
      $userarray = $user->toArray();
      $this->set(compact('userarray'));

      if($this->request->is('post')) {

        $postname = $this->request->getData('name');
  			$posthurigana  = $this->request->getData('hurigana');
  			$postmail  = $this->request->getData('email');
  			$postremail  = $this->request->getData('reemail');
  			$postpass  = $this->PassHash->hash($this->request->getData('password'));
        $postfacilitie = $this->request->getData('facilities');
        echo "<br><br><br><br><br>" . $postpass;
  			$postrepass  = $this->request->getData('repassword');

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
}
