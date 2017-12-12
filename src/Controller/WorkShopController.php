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


//作成画面
    public function create()
	{
		//Table登録


		if ($this->request->is('post')) {

			$id = $this->MakeId9->id9('pro');
			$product_id = $this->MakeId9->id9('pro');
			$name= $this->request->getData('name');
			$Model = $this->request->getData('text');
			$images = $this->request->getData('upload_gazo')['name'];
			$Model_detailses = $this->request->getData('text');
			$images_detailses = $this->request->getData('upload_gazo')['name'];
			$user = $this->MakeId9->id9('pro');
			//$this->set(compact('user'));

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

			//詳細画面
			$query = $this->product_detailses->query();
			$query->insert(['product_id','description','photo_url'])
			->values([
			'product_id' => $product_id,
			'description' => $Model_detailses,
			'photo_url'=> $images_detailses,
		]);//->execute();
echo"<br><br><br><br><br>";
			$cnt = 1;
			$cnt1 = "text".$cnt;
			$cnt2 = "upload_gazo".$cnt;
			$_POST[$cnt1];
			$_POST[$cnt2];

				while ($_POST[$cnt1] != "") {
					echo"<br>".$cnt1.$_POST[$cnt1];
					echo"<br>".$cnt2.$_POST[$cnt2];
				$query = $this->product_detailses->query();
				$query->insert(['product_id','ren','description','photo_url'])
				->values([
				'product_id' => $product_id,
				'ren' => $cnt,
				'description' => $_POST[$cnt1],
				'photo_url' => $_POST[$cnt2],
			]);//->execute();
					$cnt++;
					$cnt1 = "text".$cnt;
					$cnt2 = "upload_gazo".$cnt;

			}

		}
	}

//検索画面
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
//詳細画面
	public function detailses()
	{
		$query = $this->request->getQuery('id');

		$detailses = $this->product_detailses->find();
		$detailses->where(['product_id'=>$query]);
		$this->set('detailses',$detailses);
	}
//編集選択
	public function select()
	{
		$query = $this->Products->find();
		if ($this->request->is('post')) {
			$query->contain();

			if (!empty($this->request->getData('S_text'))) {
				$query->where(['name LIKE' => '%'. $this->request->getData('S_text') . '%']);
			}
			$query->all();
			$this->set('query', $query->all()->toArray());

			} else {
			$query->all();
			$this->set('query', $query->all()->toArray());
			}
	}
//編集入力画面
 	public function edit()
	{
		if (isset($_POST['Pdtcancelbtn'])) {
			$query = $this->Products->query();
			$query->update()
		  ->set(['Del_flg' => 1])
		  ->where(['id' => $_SESSION['id']])
		  ->execute();

		  header( 'Location: http://'.$_SERVER['HTTP_HOST'].'/silver/' );
		  unset($_SESSION['id']);
		  $this->Flash->success('ワークショップを削除しました。');
		  exit();
		}

 	}
}
