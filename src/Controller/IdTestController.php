<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

class IdTestController extends AppController
{

    public function initialize()
	{
        parent::initialize();
		$this->loadComponent('MakeId9');
    }

    public function index() {
		$abd=$this->MakeId9->id9('use');
		$this->set("a", $abd);
      	return;
    }

}
