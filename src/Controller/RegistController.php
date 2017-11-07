<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class RegistController extends AppController
{

    public function initialize()
    {
      parent::initialize();
      $this ->loadmodel('User');
    }

    public function index()
    {
      $user = $this->User->find()
      ->select(['facilities_id']);
      $results = $query->toArray();
      $this->set(compact('results'));

      /*
      $id = $this->request->data('users.id');
      $email = $this->request->data('users.email');
      $name = $this->request->data('users.name');
      $f_id = $this->request->data('users.facilities_id');
      $fclass_id = $this->request->data('users.facility_classes_id');
      $hurigana = $this->request->data('users.hurigana');
      $pass = $this->request->data('users.password');
      $user = $this->request->data('users');
      */
    }
}
