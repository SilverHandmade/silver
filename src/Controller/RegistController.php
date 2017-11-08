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
      $this ->loadmodel('users');
      $this ->loadmodel('facilities');
    }

    public function index()
    {

      $user = $this->facilities->find()
      ->select(['name']);
      $results = $user->toArray();
      $this->set(compact('results'));

    }
}
