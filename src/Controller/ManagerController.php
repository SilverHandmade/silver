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
	public function mail() {
		$queryMail = $this->answers->find()->limit(20);
		$this->set('mails', $queryMail);
	}
	public function mail_detail() {
		$queryMail = $this->answers->find()->limit(20);
		$this->set('mails', $queryMail);
	}

	public function facility() {
		$queryFacility = $this->facilities->find()->limit(20);
		$this->set('facility', $queryFacility);
	}
	public function facility_detail() {
		$queryFacility = $this->facilities->find()->limit(20);
		$this->set('facility', $queryFacility);
	}

}
