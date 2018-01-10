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
		$this->loadmodel('Users');
    }


//作成画面
    public function create()
	{
		if ($this->request->is('post')) {

			$id = $this->MakeId9->id9('pro');
			$product_id = $this->MakeId9->id9('pro');
			$name= $this->request->getData('name');
			$Model = $this->request->getData('text');
			$images = $this->request->getData('upload_gazo')['name'];
			$Model_detailses = $this->request->getData('text');
			$images_detailses = $this->request->getData('upload_gazo')['name'];
			$user = $_SESSION['Auth']['User']['id'];
			//$this->set(compact('user'));

			$query = $this->Products->query();
			$query->insert(['id', 'name', 'description','midasi_url','user_id'])
			->values([
				'id' => $id,
				'name' => $name,
				'description' => $Model,
				'midasi_url'=> $images,
				'user_id' => $user,
			])
			->execute();

			//詳細
			$query = $this->product_detailses->query();
			$query->insert(['product_id','description','photo_url'])
			->values([
				'product_id' => $product_id,
				'description' => $Model_detailses,
				'photo_url'=> $images_detailses
			])->execute();
			if(isset($_FILES) && isset($_FILES['upload_gazo']) && is_uploaded_file($_FILES['upload_gazo']['tmp_name'])){
			    $a = 'img/workshop/' . basename($_FILES['upload_gazo']['name']);
			    if(move_uploaded_file($_FILES['upload_gazo']['tmp_name'], $a)){
			        $msg = $a. 'のアップロードに成功しました';
			    }else {
			        $msg = 'アップロードに失敗しました';
			    }
			}
			echo"<br><br><br><br><br>";
			$cnt = 1;
			$cnt1 = "text".$cnt;
			$cnt2 = "upload_gazo".$cnt;
			$_POST[$cnt1];
			$this->request->data[$cnt2]['name'];
			if(isset($_POST[$cnt1])){
				while (!empty($_POST[$cnt1])) {
					echo"<br>".$cnt1.$_POST[$cnt1];
					echo"<br>".$cnt2.$this->request->data[$cnt2]['name'];
					$query = $this->product_detailses->query();
					$query->insert(['product_id','ren','description','photo_url'])
					->values([
						'product_id' => $product_id,
						'ren' => $cnt,
						'description' => $_POST[$cnt1],
						'photo_url' => $this->request->data[$cnt2]['name'],
					])->execute();

					if(isset($_FILES)&& isset($_FILES['upload_gazo'.$cnt]) && is_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'])){
					    $a = 'img/workshop/' . basename($_FILES['upload_gazo'.$cnt]['name']);
					    if(move_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'], $a)){
					        $msg = $a. 'のアップロードに成功しました';
					    }else {
					        $msg = 'アップロードに失敗しました';
					    }
					}
					$cnt++;
					$gazo_name = 'upload_gazo'.$cnt;
					$cnt1 = "text".$cnt;
					$cnt2 = "upload_gazo".$cnt;
				}
			}
			$this->redirect(['controller' => 'TopPage', 'action' => 'index']);
		}
	}

	//検索画面
	public function index()
	{
		$query = $this->Users->find()
			->select(['id','facility_classes_id'])
			->where(['id' => $_SESSION['Auth']['User']['id']]);

		$user_faci = $query->all()->ToArray();
		$this->set(compact('user_faci'));



		$query = $this->Products->find()
		->where(['Del_flg' => 0]);

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
	public function detail()
	{
		$query = $this->Users->find()
			->select(['id','facility_classes_id'])
			->where(['id' => $_SESSION['Auth']['User']['id']]);

		$user_faci = $query->all()->ToArray();
		$this->set(compact('user_faci'));

		$query = $this->request->getParam('id');
		$detailses = $this->product_detailses->find();
		$detailses->where(['product_id'=>$query]);
		$this->set('detailses',$detailses);
	}
	//編集選択
	public function select()
	{
		$_SESSION['edit_flg'] = 0;

		$query = $this->Products->find('all',array(
			'conditions' =>array('user_id'=>$_SESSION['Auth']['User']['id'],
				'and' => array(['Del_flg' => 0])
			)
		));

		$login_user = $query->all()->ToArray();
		$this->set(compact('login_user'));

		if ($this->request->is('post')) {
			$query->contain();

			if (!empty($this->request->getData('S_text'))) {
				$query->where(['name LIKE' => '%'. $this->request->getData('S_text') . '%']);
			}
			$query->all();
			$this->set('login_user', $query->all()->toArray());

		} else {
			$query->all();
			$this->set('login_user', $query->all()->toArray());
		}

	}
	//編集入力画面
 	public function edit()
	{
		$_SESSION['dateCheck'] = 0;

		if (isset($_POST['Pdtcancelbtn'])) {
			$query = $this->Products->query();
			$query->update()
			->set(['Del_flg' => 1])
			->where(['id' => $_SESSION['sel_id']])
			->execute();
		}
		$get_id = $this->request->getParam('id');
		  if ($get_id != ""){
			$query = $this->product_detailses->find()
			->where(['product_id'=> $get_id]);
			$edit_pdt = $query->all()->ToArray();
			$this->set(compact('edit_pdt'));

			$_SESSION['sel_id'] = $edit_pdt[0]['product_id'];
		  }

 	}
	//編集確認画面
	public function Confirmation(){
		if(isset($_POST['nextbtn'])){

		}
	}
}
