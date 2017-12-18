<?php
namespace App\Error;

use Cake\Controller\ErrorController;
use Cake\Event\Event;

class AppErrorController extends ErrorController {
	public function initialize()
    {
		parent::initialize();
		$this->loadComponent('Userinfo');
		$user = $this->Userinfo->setname();
		$this->set(compact('user'));
    }

	public function beforeRender(Event $event)
    {
		$this->viewBuilder()->layout('error');
		//Templateファイルのあるパスを指定(src/Template/Error/)
		$this->viewBuilder()->templatePath('Error');
    }
}
