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
		$this->loadmodel('Facilities');
		$this->loadmodel('Products');
		$this->loadmodel('Witses');
    }


    public function index() {
		$user = $this->Userinfo->getuser();
		$queryRequest = $this->Requests->find()->contain('Facilities')
		->select(['id', 'Requests.title', 'Requests.To_date', 'Facilities.name'])
		->order(['Requests.To_date' => 'DESC'])
		->limit(4);
		$request = $queryRequest->toArray();
		$this->set(compact('request'));

		$queryWorkShop = $this->Products->find()
		->select(['id', 'name', 'midasi_url', 'Postdate'])
		->order(['Postdate' => 'DESC'])
		->limit(4)->all();
		$workshop = $queryWorkShop->toArray();
		$this->set(compact('workshop'));

		$queryWitses = $this->Witses->find()
		->select(['id', 'title', 'Postdate'])
		->order(['Postdate' => 'DESC'])
		->limit(4)->all();
		$witses = $queryWitses->toArray();
		$this->set(compact('witses'));

    }
}
