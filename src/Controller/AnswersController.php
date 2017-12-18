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



    }
    public function index() {
		$witses = $this->witses->find('all')
		->where(['Del_flg ='=> 0])
		->order(['id' => 'DESC']);
        $witsesArray = $witses->toArray();
        $this->set(compact('witsesArray'));

    }
	public function detail(){


		$user = $this->Userinfo->getuser();
		if (empty($user)) {
			$this->redirect(['controller' => 'login', 'action' => 'index', 'ref' => $this->name]);
		}

		$witses = $this->witses->find('all');
        $witsesArray = $witses->toArray();
        $this->set(compact('witsesArray'));

		$get_id = $this->request->getParam('id');

		$witId = $this->witses->find('all')
		->where(['id ='=> $get_id]);
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


		$query = $this->wits_messages->find()
		->select(['wits_id','ren','transmit','message','users.name','facilities.name'])
		->join([
			'table' => 'users',
			'type' => 'INNER',
			'conditions' => 'user_id = users.id'])
		->join([
			'table' => 'facilities',
			'type' => 'INNER',
			'conditions' => 'facilities.id = users.facilities_id'])
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
		if (empty($user)) {
			$this->redirect(['controller' => 'login', 'action' => 'index', 'ref' => $this->name]);
		}

		$get_id = $this->request->getQuery('id');

		$query = $this->witses->find()
		->select(['user_id','title','content','Postdate'])
		->where(['id ='=>$get_id]);
		$detailId = $query->all()->ToArray();
		$this->set(compact('detailId'));

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
		if (empty($user)) {
			$this->redirect(['controller' => 'login', 'action' => 'index', 'ref' => $this->name]);
		}

		//施設情報の取得
		$query = $this->witses->find();
		$query->select(['id' => $query->func()->max('id')]);
		$detailId = $query->all()->ToArray();
		$this->set(compact('detailId'));

		$incId = $detailId[0]['id'] + 1;
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
				'id' => $incId,
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
