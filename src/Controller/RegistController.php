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

      $user = $this->users->find()
      ->select(['facilities_id']);
      $results = $user->toArray();
      $results = reset($results);
      $this->set(compact('results'));

      $facilitie = $this->facilities->find()
      ->select(['id'])
      ->where(['id' => 'results.facilities_id']);
      $id = $facilitie->toArray();
      $id = reset($id);
      $this->set(compact('id'));


    }
}
