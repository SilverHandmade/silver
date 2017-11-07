<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class TopPageController extends AppController
{

    public function initialize()
    {
        parent::initialize();

		$this->loadComponent('SetUsername');
		$user = $this->SetUsername->setname();
		$this->set('username', $user['name']);
		$this->set('url', $user['url']);
		$this->set('tranceName', $user['tranceName']);

    }


    public function index() {

    }
}
