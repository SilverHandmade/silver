<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;

class RequestController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadmodel('Products');

    }
    public function index()
    {

      		$query = $this->Products->find()
          ->select(['id']);
      		$results = $query->all()->ToArray();
          $jsonResults = json_encode($results);
      $this->set(compact('results'));


    }


}
