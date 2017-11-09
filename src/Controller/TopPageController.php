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
		$this->loadmodel('Requests');
    }


    public function index() {
		$queryRequest = $this->Requests->find()
		/*->where(['imicode' => $reqestimicode])*/->all();
		$request = $queryRequest->toArray();
		$requestCount = $queryRequest->count();
		$this->set(compact('request'));
		$this->set(compact('requestCount'));


    }
}
