<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class ManagerController extends AppController
{
	public function initialize()
	{
		parent::initialize();

		$this->loadmodel('questions');
		$this ->loadmodel('users');
		$this ->loadmodel('facilities');
		$this ->loadmodel('facility_classes');
		$this->loadComponent('PassHash');
		$this->loadComponent('MakeId9');
	}

	public function index() {
		$queryMail = $this->questions->find('all')->contain('users')
		->where(['questions.kan_flg' => 0])
		->limit(4);
		$this->set('mail', $queryMail);

		$queryFacility = $this->facilities->find('all')->limit(4)
		->where(['Del_flg' => 0])
		->where(['facilities.Del_flg' => 0])
;
		$this->set('facility', $queryFacility);

		$queryUsers = $this->users->find('all')->contain('facilities')
		->where(['users.Del_flg' => 0])
		->order(['users.Registdate' => 'DESC'])
		->limit(4);
		$this->set('User', $queryUsers);
	}

	public function mails() {
		$queryMail = $this->questions->find('all')->contain('users')->limit(20);
		$this->set('mails', $queryMail);

		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('name'))) {
				$queryMail->where(['name LIKE' => '%' . $this->request->getData('name') . '%']);
			}
			$this->set('mails', $queryMail->toArray());
			$this->render("/Element/Manager/mailsSearchResult");
		}
	}
	public function mailDetail() {
		$mailId = $this->request->getParam('id');
		$queryMail = $this->questions->get($mailId);
		$this->set('mails', $queryMail);
	}

	public function facilities() {
		$queryFacility = $this->facilities->find()->limit(20);
		$this->set('facilities', $queryFacility);
		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('name'))) {
				$queryFacility->where(['name LIKE' => '%' . $this->request->getData('name') . '%']);
			}
			$this->set('facilities', $queryFacility->toArray());
			$this->render("/Element/Manager/facilitiesResult");
		}
	}
	public function facilityDetail() {
		$queryFacility = $this->facilities->find()->limit(20);
		$this->set('facility', $queryFacility);
	}
	public function facilityRegist() {

	}


	public function users() {
		$queryUser = $this->users->find('all')->contain('facilities')
		->order(['users.Registdate' => 'DESC'])
		->limit(20);
		$this->set('users', $queryUser);
		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('name'))) {
				$queryUser->where(['users.name LIKE' => '%' . $this->request->getData('name') . '%']);
			}
			$this->set('users', $queryUser);
			$this->render("/Element/Manager/usersResult");
		}
	}
	public function userDetail() {
		$queryUser = $this->users->find()->limit(20);
		$this->set('user', $queryUser);
	}
	public function userRegist() {
		$query = $this->facilities->find()
		->where(['Del_flg ='=> 0])
		->order(['id' => 'DESC']);

		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('fClassId'))) {
				$query->where(['facility_classes_id =' => $this->request->getData('fClassId')]);
			}
		} else {
			$query->where(['facility_classes_id =' => 1]);
		}
		$facilitiesArray = $query->toArray();
		$this->set(compact('facilitiesArray'));
		if ($this->request->is('ajax')) {
			$this->render('/Element/Regist/facilities');
		}

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
	}

	public function userConfirm(){

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
			$postname = htmlentities($_POST['name']);
			$posthurigana = htmlentities($_POST['hurigana']);
			$postmail = htmlentities($_POST['email']);
			$postpass = $this->PassHash->hash($_POST['password']);
			$postfacilitie = $_POST['facilities'];
			$postfClassId = $_POST['fClassId'];

			$query = $this->facilities->get($postfacilitie);
			$fnamearray = $query->toArray();
			$this->set(compact('fnamearray'));

			if (!empty($_POST['flg'])) {
				$query = $this->users->query();
				$query->insert([
					'id','email','name','facilities_id','facility_classes_id','hurigana','password','Del_flg'
				])
				->values([
					'id' => $this->MakeId9->id9('use'),
					'email' => $postmail,
					'name' => $postname,
					'facilities_id' => $postfacilitie,
					'facility_classes_id' => $postfClassId,
					'hurigana' => $posthurigana,
					'password' => $postpass,
					'Del_flg' => 0
				])
				->execute();
				$this->redirect(['controller' => 'TopPage', 'action' => 'index']);
			}
		}
	}
}
