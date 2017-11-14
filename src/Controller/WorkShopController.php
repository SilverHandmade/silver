<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\Table;

class WorkShopController extends AppController
{

    public function initialize()
    {
        parent::initialize();
				$this->loadmodel('Products');

    }
    public function index()
	{
		//Table登録
		if ($this->request->is('post')) {
			$id = $this->request->getData('id');
			$name= $this->request->getData('name');
			$Model = $this->request->getData('Model/field');
			$images = $this->request->getData('image');
			$Postdate = $this->request->getData('Postdate');
			$user = $this->request->getData('user');
			// $this->set(compact('Model'));

			// echo "<br><br><br><br><br><br>" . $Days;
			$query = $this->Products->query();
			$query->insert(['id', 'name', 'description','midasi_url','Postdate','user_id'])
			->values([
				'id' => $id,
				'name' => $name,
				'description' => $Model,
				'midasi_url'=> $images,
				'Postdate' => $Postdate,
				'user_id' => $user
	    	]);
		//->execute();



		}
	}
	public function search()
	{

	}
}
