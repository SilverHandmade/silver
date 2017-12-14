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



    }
    public function index() {
		$witses = $this->witses->find('all');
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

		$wits_messages = $this->wits_messages->find('all')
		->where(['wits_id ='=>$get_id]);
		$witmesArray = $wits_messages->toArray();
		$this->set(compact('witmesArray'));

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

		if (isset($_POST['ans-submit'])) {
			$answertxt = $_POST['ans-submit'];
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
			$posttitle = $_POST['titletxt'];
			$postcontent = $_POST['textarea'];
		}

		if (!empty($_POST['flg'])) {
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
		}

		// id 知恵ID title タイトル content お悩み内容 user_id 投稿者 Postdate 投稿日 kan_flg 完了フラグ Del_flg

		// $this->redirect(['controller' => 'answers', 'action' => 'index']);

	}
}
