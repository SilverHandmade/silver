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
		$user = $this->Userinfo->getuser();
		if (empty($user) || $user['facility_classes_id'] != 9) {
			$this->redirect(['controller' => 'TopPage', 'action' => 'index']);
		}

		$this->loadmodel('answers');
		$this->loadmodel('facilities');
		$this->loadmodel('users');
	}

	public function index() {
		$queryMail = $this->answers->find('all')->contain('users')
		->where(['Answers.kan_flg' => 0, 'Answers.Del_flg' => 0])
		->limit(4);
		$this->set('mail', $queryMail);

		$queryFacility = $this->facilities->find('all')->limit(4)
		->where(['Del_flg' => 0]);
		$this->set('facility', $queryFacility);

		$queryUsers = $this->users->find('all')->contain('facilities')
		->where(['Users.Del_flg' => 0])
		->limit(4);
		$this->set('User', $queryUsers);
	}

	public function mails() {
		$queryMail = $this->answers->find()->limit(20);
		$this->set('mails', $queryMail);
		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('name'))) {
				$queryMail->where(['name LIKE' => '%' . $this->request->getData('name') . '%']);
			}
			$this->set('mails', $queryMail->toArray());
        	$this->render("/Element/Manager/mailsSearchResult");
		}
	}
	public function MailDetail() {
		$mailId = $this->request->getParam('id');
		$queryMail = $this->answers->get($mailId);
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
	public function facility_detail() {
		$queryFacility = $this->facilities->find()->limit(20);
		$this->set('facility', $queryFacility);
	}

	public function users() {
		$queryUser = $this->users->find()->limit(20);
		$this->set('user', $queryUser);
	}
	public function user_detail() {
		$queryUser = $this->users->find()->limit(20);
		$this->set('user', $queryUser);
	}

}
