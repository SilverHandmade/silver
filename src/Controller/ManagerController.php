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

	private function setFacilityClassArray() {
		$fClass = $this->facility_classes->find('all');
		$fClassArray = $fClass->toArray();
		$this->set(compact('fClassArray'));
	}

	public function index() {
		$queryMail = $this->questions->find('all')->contain('users')
		->where(['questions.kan_flg' => 0])
		->limit(4);
		$this->set('mail', $queryMail);

		$queryFacility = $this->facilities->find('all')->limit(4)
		->where(['Del_flg' => 0])
		->where(['facilities.Del_flg' => 0]);
		$this->set('facilities', $queryFacility);

		$queryUsers = $this->users->find('all')->contain('facilities')
		->where(['users.Del_flg' => 0])
		->order(['users.Registdate' => 'DESC'])
		->limit(4);
		$this->set('users', $queryUsers);
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
		$queryMail = $this->questions->get($this->request->getParam('id'));
		$this->set('mail', $queryMail);
	}

	public function facilities() {
		$this->setFacilityClassArray();

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
		if ($this->request->is('ajax')) {
			$this->autoRender = FALSE;
			$query = $this->facilities->query()->update()
			->where(['id' => $this->request->getParam('id')]);

			$query->set([
				'name' => $this->request->getData('name'),
				'facility_classes_id' => $this->request->getData('fClassId'),
				'Post' => $this->request->getData('zip11'),
				'address' => $this->request->getData('addr11'),
				'Del_flg' => $this->request->getData('Del_flg')
			]);
			try {
				$query->execute();
				echo 'True';
			} catch (\Exception $e) {
				echo 'False';
			}
		}

	}
	public function facilityRegist() {
		$this->setFacilityClassArray();

		if ($this->request->is('post')) {
			$query = $this->facilities->query();
			$query->insert(['id', 'name', 'facility_classes_id', 'Post', 'address', 'Del_flg'])
			->values([
				'id' => $this->MakeId9->id9('fac'),
				'name' => $this->request->getData('name'),
				'facility_classes_id' => $this->request->getData('fClassId'),
				'Post' => $this->request->getData('zip11'),
				'address' => $this->request->getData('addr11'),
				'Del_flg' => 0
			]);
			$query->execute();

		}
	}


	public function users() {
		$this->setFacilityClassArray();

		$query = $this->facilities->find()
		->where(['Del_flg ='=> 0])
		->order(['id' => 'DESC'])
		->where(['facility_classes_id =' => $this->request->getData('fClassId')]);
		$facilitiesArray = $query->toArray();
		$this->set(compact('facilitiesArray'));

		$queryUser = $this->users->find('all')->contain('facilities')
		->order(['users.Registdate' => 'DESC'])
		->limit(20);
		$this->set('users', $queryUser);

		if ($this->request->is('ajax') && !$this->request->getData('updateFlg')) {
			if ($this->request->is('ajax') && !is_null($this->request->getData('searchName'))) {
				// searchAjax専用
				$queryUser->where(['users.name LIKE' => '%' . $this->request->getData('searchName') . '%']);
				$this->set('users', $queryUser);
				$this->render("/Element/Manager/usersResult");
			} else {
				$this->set('FacilityId', $this->users->get($this->request->getData('id'))->toArray()['facilities_id']);
				$this->render("/Element/Manager/fClassResult");
			}
		}

	}
	public function userDetail() {
		$this->autoRender = FALSE;
		if ($this->request->is('ajax') && $this->request->getData('updateFlg')) {
			$query = $this->users->query()->update()
			->where(['id' => $this->request->getParam('id')]);
			$query->set([
				'name' => htmlentities($_POST['name']),
				'hurigana' => htmlentities($_POST['hurigana']),
				'facilities_id' => $_POST['facilities'],
				'facility_classes_id' => $_POST['fClassId'],
				'Del_flg' => $this->request->getData('Del_flg')
			]);
			try {
				$query->execute();
				echo 'True';
			} catch (\Exception $e) {
				echo 'False';
			}
		}
	}
	public function userRegist() {
		$this->setFacilityClassArray();

		$query = $this->facilities->find()
		->where(['Del_flg ='=> 0])
		->order(['id' => 'DESC']);

		$facility_classes_id = 1;
		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('fClassId'))) {
				$facility_classes_id = $this->request->getData('fClassId');
			}
		}

		$query->where(['facility_classes_id =' => $facility_classes_id]);
		$facilitiesArray = $query->toArray();
		$this->set(compact('facilitiesArray'));

		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('fClassId'))) {
				$this->render('/Element/Regist/facilities');
			}
			if (!empty($this->request->getData('email'))) {
				$this->autoRender = FALSE;
				$mailAddCount = $this->users->find('all')
				->where(['email LIKE' => $this->request->getData('email')])
				->toArray();
				$mailAddCount = count($mailAddCount);
				echo $mailAddCount;
			}
		}
	}

	public function userConfirm(){
		if ($this->request->is('post')) {
			$postfacilitie = $_POST['facilities'];
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
					'email' => htmlentities($_POST['email']),
					'name' => htmlentities($_POST['name']),
					'facilities_id' => $postfacilitie,
					'facility_classes_id' => $_POST['fClassId'],
					'hurigana' => htmlentities($_POST['hurigana']),
					'password' => $this->PassHash->hash($_POST['password']),
					'Del_flg' => 0
				])
				->execute();
				$this->redirect(['controller' => 'Manager', 'action' => 'user']);
			}
		}
	}
}
