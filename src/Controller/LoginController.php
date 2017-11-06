<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class LoginController extends AppController
{

    public function initialize()
    {
        parent::initialize();


    }
    public function index()
    {
			if ($this->request->is('post')) {
				$user = $this->Auth->identify();
				if ($user) {
						$this->Auth->setUser($user);
						return $this->redirect(['controller' => 'TopPage', 'action' => 'index']);
				} else {
						$this->Flash->error(__('Username or password is incorrect'));
				}
		}

    }
}
