<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class AnswersController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		$this->loadModel('witses');
		$this->loadModel('wits_messages');
		$this->loadModel('facilities');
		$this->loadModel('users');
		$this->loadComponent('MakeId9');

		// ログイン確認
		if (empty($this->Userinfo->getuser())) {
			$this->redirect(['controller' => 'login', 'action' => 'index']);
		}
	}

	public function index() {
		$query = $this->witses->find()
		->where(['Del_flg ='=> 0])
		->order(['id' => 'DESC']);

		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('indextxt'))) {
				$query->where(['title LIKE' => '%' . $this->request->getData('indextxt') . '%']);
			}
		}else {
			$query->limit(20);
		}

		$witsesArray = $query->toArray();
		$this->set(compact('witsesArray'));
		if ($this->request->is('ajax')) {
			$this->render('/Element/answers');
		}

	}

	public function detail(){
		$user = $this->Userinfo->getuser();

		$get_id = $this->request->getParam('id');
		// $witId = $this->witses->find('all')
		// ->where(['id ='=> $get_id]);
		// 下に置き換え　上田
		$witId = $this->witses->get($get_id);

		$witsesId = $witId->toArray();
		$this->set(compact('witsesId'));


		$query = $this->wits_messages->find();
		$query->select(['ren' => $query->func()->max('ren')])
		->where(['wits_id ='=>$get_id]);
		$maxRenArray = $query->all()->ToArray();
		$this->set(compact('maxRenArray'));

		$query = $this->witses->find()
		->select(['user_id','title','content','Postdate'])
		->where(['id ='=>$get_id]);
		$detailId = $query->all()->ToArray();
		$this->set(compact('detailId'));

		$query = $this->witses->find()
		->select(['facilities.name'])
		->join([
			'table' => 'users',
			'type' => 'INNER',
			'conditions' => 'user_id = users.id'
		])
		->join([
			'table' => 'facilities',
			'type' => 'INNER',
			'conditions' => 'facilities.id = users.facilities_id'
		])
		->where(['witses.id ' => $get_id]);
		$facilitiesname = $query->all()->ToArray();
		$this->set(compact('facilitiesname'));


		$query = $this->wits_messages->find()
		->select(['wits_id','ren','transmit','message','users.name','facilities.name'])
		->join([
			'table' => 'users',
			'type' => 'INNER',
			'conditions' => 'user_id = users.id'
		])
		->join([
			'table' => 'facilities',
			'type' => 'INNER',
			'conditions' => 'facilities.id = users.facilities_id'
		])
		->where(['wits_id' => $get_id])
		->order(['ren' => 'DESC']);
		$mes_namelist = $query->all()->ToArray();
		$this->set(compact('mes_namelist'));

		if (isset($_POST['ans-submit'])) {
			$answertxt = htmlentities($_POST['textarea']);
			$userId = $user['id'];
			$nowdate = date("Y/m/d H:i:s");
			$incRen = $maxRenArray[0]['ren'] + 1;

			$query = $this->wits_messages->query();
			$query->insert([
				'wits_id','ren','message','transmit','user_id','Del_flg'
			])
			->values([
				'wits_id' => $get_id,
				'ren' => $incRen,
				'message' => $answertxt,
				'transmit' => $nowdate,
				'user_id' => $userId,
				'Del_flg' => '0'
			])
			->execute();
		}

		$wits_messages = $this->wits_messages->find('all')
		->where(['wits_id ='=>$get_id]);
		$witmesArray = $wits_messages->toArray();
		$this->set(compact('witmesArray'));
	}

	public function edit(){

		$user = $this->Userinfo->getuser();
		// if (empty($user)) {
		// 	$this->redirect(['controller' => 'login', 'action' => 'index', 'ref' => $this->name]);
		// }

		$get_id = $this->request->getQuery('id');

		$query = $this->witses->find()
		->select(['user_id','title','content','Postdate'])
		->where(['id ='=>$get_id]);
		$detailId = $query->all()->ToArray();
		$this->set(compact('detailId'));

		$query = $this->witses->find()
		->select(['facilities.name',])
		->join([
			'table' => 'users',
			'type' => 'INNER',
			'conditions' => 'user_id = users.id'])
		->join([
			'table' => 'facilities',
			'type' => 'INNER',
			'conditions' => 'facilities.id = users.facilities_id'
		])
		->where(['witses.id ' => $get_id]);
		$facilitiesname = $query->all()->ToArray();
		$this->set(compact('facilitiesname'));

		if (isset($_POST['editbtn'])) {

			$editTitle = htmlentities($_POST['edittitle']);
			$editContent = htmlentities($_POST['editcontent']);
			$nowdate = date("Y/m/d H:i:s");

			$query = $this->witses->query();
				$query->update()
			->set([
				'title' => $editTitle,
  				'content' => $editContent,
  				'Postdate' => $nowdate
			])
			->where(['id =' =>$get_id])
			->execute();

			$this->redirect(['controller'=>'answers']);
			$this->Flash->success('変更した内容を保存しました');
		}
		if (isset($_POST['editdelete'])) {

			$query = $this->witses->query();
				$query->update()
			->set([
				'Del_flg' => 1
			])
			->where(['id =' =>$get_id])
			->execute();

			$this->redirect(['controller'=>'answers']);
			$this->Flash->success('削除しました');
		}
	}

	public function create(){
		$user = $this->Userinfo->getuser();
		// if (empty($user)) {
		// 	$this->redirect(['controller' => 'login', 'action' => 'index', 'ref' => $this->name]);
		// }

		//施設情報の取得
		$query = $this->witses->find();
		$query->select(['id' => $query->func()->max('id')]);
		$detailId = $query->all()->ToArray();
		$this->set(compact('detailId'));

		$detailId = $this->MakeId9->id9('wit');
		$sessionId = $user['id'];
		$nowdate = date("Y-m-d H:i:s");
		// $postUid = $_POST[''];

		if ($this->request->is('post')) {
			$posttitle = htmlentities($_POST['titletxt']);
			$postcontent = htmlentities($_POST['textarea']);
		}

		if ($this->request->is('post')) {
			$query = $this->witses->query();
			$query->insert([
				'id','title','content','user_id','Postdate'
			])
			->values([
				'id' => $detailId,
				'title' => $posttitle,
				'content' => $postcontent,
				'user_id' => $sessionId,
				'Postdate' => $nowdate
			])
			->execute();

			$this->redirect(['controller'=>'answers']);
			$this->Flash->success('投稿されました');
		}

		// $this->redirect(['controller' => 'answers', 'action' => 'index']);

	}
}
