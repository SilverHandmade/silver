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
]);

    }
    public function index()
    {

    }
}
