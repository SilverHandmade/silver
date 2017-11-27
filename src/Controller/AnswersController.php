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
   // id 知恵ID title タイトル content お悩み内容 user_id 投稿者 Postdate 投稿日 kan_flg 完了フラグ Del_flg
   public function index() {
		$witses = $this->witses->find('all');
        $witsesArray = $witses->toArray();
        $this->set(compact('witsesArray'));

		if ($this->request->is('post')) {
			$postindex = $_POST['indextxt'];
		}
			$query = $this->witses->query();
			$query->select(['id','title','content','user_id','Postdate'])
			->where(['title LIKE' => '%$postindex%']);
			$result = $query->toArray();
			$this->set(compact('result'));
    }
	public function detail(){
		

		if($this->request->is('post')) {
			$posttitle = $_POST['title'];
			$postcontent = $_POST['content'];
			$postdate = $_POST['Postdate'];
			$postid = $_POST['id'];
			$postUid = $_POST['user_id'];
		}
	}
}
