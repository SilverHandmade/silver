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
		$queryMail = $this->answers->find('all')->limit(4);
		$this->set('mail', $queryMail);

		$queryFacility = $this->answers->find('all')->limit(4);
		$this->set('facility', $queryFacility);
	}
	public function mails() {
		$queryMail = $this->answers->find()->limit(20);
		$this->set('mails', $queryMail);

	}


}
