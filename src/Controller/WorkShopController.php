<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class WorkShopController extends AppController
{

    public function initialize()
    {
        parent::initialize();

    }
    public function index()
    {
			$Products_datailsesTable = TableRegistry::get('Products_datailses');

    }
}
