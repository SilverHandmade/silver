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
        $this->loadmodel('facilities');

    }
    public function index()
    {
      $connection = ConnectionManager::get('default');
      $query = $this->Facilities->find();
      $results =
          $query->select('*')
          ->from('facilities')
          ->execute();


          $this->set('results', $results->toArray());



    }
}
