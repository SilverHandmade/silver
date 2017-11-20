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
				$this->loadComponent('MakeId9');

    }
    public function create()
	{
		//Table登録
		if ($this->request->is('post')) {
			$id = $this->MakeId9->id9('pro');
			$name= $this->request->getData('name');
			$Model = $this->request->getData('text');
			$images = $this->request->getData('Upload');
			$user = $this->MakeId9->id9('pro');
			//$this->set(compact('user'));

			 //echo "<br><br><br><br><br><br>" . $this->MakeId9->id9('pro');
			$query = $this->Products->query();
			$query->insert(['id', 'name', 'description','midasi_url','user_id'])
			->values([
				'id' => $id,
				'name' => $name,
				'description' => $Model,
				'midasi_url'=> $images,
				'user_id' => $user
	    	]);
			//->execute();



		}
	}
	public function index()
	{
		$query = $this->Products->find();
		if ($this->request->is('post')) {
			$query->contain();

			if (!empty($this->request->getData('searchtext'))) {
				$query->where(['name LIKE' => '%'. $this->request->getData('searchtext') . '%']);
			}
			$query->all();
			$this->set('query', $query->all()->toArray());

			} else {
			$query->all();
			$this->set('query', $query->all()->toArray());
			}
	}

}
