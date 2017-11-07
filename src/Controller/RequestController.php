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
        //$this->loadmodel('Facilities');

    }
    public function index()
    {
      
      		//$query = $this->Facilities->find()
          //->select(['name', 'post','address'])
          //->where(['facility_classes_id =' => 2]);
      		//$results = $query->all()->toArray();

      //$this->set(compact('results'));



    }
}
