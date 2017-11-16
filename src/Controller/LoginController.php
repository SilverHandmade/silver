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
			],
			'loginRedirect' => [ // ログイン後に遷移するアクションを指定
                'controller' => 'TopPage',
                'action' => 'index'
            ],
			'logoutRedirect' => [ // ログアウト後に遷移するアクションを指定
                'controller' => 'TopPage',
                'action' => 'index',
            ]
		]);
    }
    // ログイン
    public function index()
    {
		if ($this->request->is('post')) {
			$session = $this->request->session();
			$user = $this->Auth->identify();
			if ($user) {
				// $this->Auth->setUser($user);
				$session->write([
					'id' => $user['id'],
					'username' => $user['name'],
					'userID' => $user['email'],
					'loginFlg' => True
				]);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
    }

	public function logout() {
		$session = $this->request->session();
		if(empty($session->read('username') ) || empty($session->read('userID'))){
			$this->redirect($this->Auth->redirectUrl());
		}
		$session->destroy();
		return $this->redirect($this->Auth->logout());
	}
}
