<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class LoginController extends AppController
{

    public function initialize()
    {
        parent::initialize();
		//認証
		$this->loadComponent('Auth',[
			'authenticate' => [
				'Form' => [
					'fields' => [
						'username' => 'email',
						'password' => 'password'
					]
				]
			],
			'loginAction' => [
				'controller' => 'Login',
				'action' => 'index'
			]
		]);

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
