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
				$this->loadmodel('product_detailses');
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
			$images = $this->request->getData('upload')['name'];
			$Model_detailses = $this->request->getData('text');
			$images_detailses = $this->request->getData('Upload');['name'];
			$user = $this->MakeId9->id9('pro');
			//$this->set(compact('user'));

			//  echo "<br><br><br><br><br><br>" . $this->request->getData('upload');
			$query = $this->Products->query();
			$query->insert(['id', 'name', 'description','midasi_url','user_id'])
			->values([
				'id' => $id,
				'name' => $name,
				'description' => $Model,
				'midasi_url'=> $images,
				'user_id' => $user,
			]);

		//->execute();


				$query = $this->product_detailses->query();
				$query->insert(['product_id', 'description','photo_url'])
				->values([
					'product_id' => $id,
					'description' => $Model_detailses,
					'photo_url'=> $images_detailses,
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

	public function detailses()
	{
		if($this->request->is('post')){
			$query = $this->Product_detailses->find()
			->where(['product_id ='=>$_POST['product_id']]);
			$pdt = $query->all()->ToArray();
			$this->set(compact('pdt'));
		}

	}
}
