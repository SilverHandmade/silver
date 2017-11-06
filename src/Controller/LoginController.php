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

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
     public function initialize()
     {
         parent::initialize();

     }
     public function index()
     {
       parent::initialize();
    $this->loadComponent('Flash');
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
		'controller' => 'Users',
		'action' => 'login'
	]
  ] );
        // 登録

        // ログイン
     }
}
