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
        $this->viewBuilder()->layout('base');
    }

    public function index()
    {
//        if ($this->request->is('post')) {
            $this->render('regist');
//        } else {
            $this->render('index');
//        }
    }
}
