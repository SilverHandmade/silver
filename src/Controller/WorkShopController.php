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
				$this->loadmodel('Product');

    }
    public function index()
    {
			//Table登録
			if ($this->request->is('post')) {
				$Days = $this->request->getData('Day');
				$Facilitys = $this->request->getData('Facility');
				$Model = $this->request->getData('Model/field');
				// $this->set(compact('Model'));
				$query = $this->Product->query();
				$query->insert(['product_id', 'ren', 'description'])
    			->values([
						'product_id' -> $Days,
						'ren' -> $Facilitys,
        		'description' -> $Model
		    ])
    ->execute();

			}
		}
}
