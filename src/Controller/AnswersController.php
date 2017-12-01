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

		$session = $this->request->session();
		//ログインチェック
		if (!$session->read('loginFlg')) {
			$this->redirect(['controller' => 'login']);
		}
    }
    public function index() {
		$witses = $this->witses->find('all');
        $witsesArray = $witses->toArray();
        $this->set(compact('witsesArray'));

    }
	public function detail(){
		$witses = $this->witses->find('all');
        $witsesArray = $witses->toArray();
        $this->set(compact('witsesArray'));



		if($this->request->is('post')) {
			$posttitle = $_POST['hidetitle'];
			$postcontent = $_POST['hidecontent'];
			$postdate = $_POST['hidedate'];
			$postid = $_POST['witsesId'];
			$postUid = $_POST['witsesUId'];
			$sessionUid = $_SESSION['Auth']['User']['facilities_id'];
		}

		if ($this->request->is('post')){

			//施設情報の取得
			$query = $this->witses->find()
			->where(['id ='=>$_POST['witsesId']]);
			$detailId = $query->all()->ToArray();
			$this->set(compact('detailId'));

		}
	}

	public function create(){
		if ($this->request->is('post')){

			//施設情報の取得
			$query = $this->witses->find();
			$detailId = $query->all()->ToArray();
			$this->set(compact('detailId'));


			if($this->request->is('post')) {
				$posttitle = $_POST['titletxt'];
				$postcontent = $_POST['contenttxt'];
				$sessionId = $_SESSION['Auth']['User']['id'];
				$nowdate = date("Y-m-d H:i:s");
				// $postUid = $_POST[''];
			}

				$query = $this->witses->query();
				$query->insert([
					'id','title','content','user_id','Postdate'
				])
				->values([
					'id' => '1006',
					'title' => $posttitle,
					'content' => $postcontent,
					'user_id' => $sessionId,
					'Postdate' => $nowdate
				])
				->execute();
				// id 知恵ID title タイトル content お悩み内容 user_id 投稿者 Postdate 投稿日 kan_flg 完了フラグ Del_flg

				$this->redirect(['controller' => 'answers', 'action' => 'index']);

		}
	}
}
