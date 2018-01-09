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
		$this->loadmodel('facilities');
		$this->loadmodel('users');
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
}
