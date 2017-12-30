<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Cache\Cache;
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
		$session = $this->request->session();
		// セッション情報取得
		// if ($session->read('loginFlg')) {
		// 	$this->redirect(['controller' => 'TopPage', 'action' => 'index']);
		// }
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
				'action' => 'index'
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
				$this->Auth->setUser($user);
				return $this->redirect(['controller' => $this->request->getQuery('ref')]);
			}
			$this->Flash->error(__('ログインに失敗しました。'));
		}
	}
	public function logout() {
		$session = $this->request->session();
		if(empty($session->read('Auth'))){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$session->destroy();
		return $this->redirect($this->Auth->logout());
	}
}
