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

    }
	public function detail(){
		$witses = $this->witses->find('all');
        $witsesArray = $witses->toArray();
        $this->set(compact('witsesArray'));

		if($this->request->is('post')) {
			$posttitle = $_POST['wtitle'];
			$postcontent = $_POST['wcontent'];
			$postdate = $_POST['wdate'];
			$postid = $_POST['witsesId'];
			$postUid = $_POST['witsesUId'];
		}

		if ($this->request->is('post')){

			//施設情報の取得
			$query = $this->witses->find()
			->where(['id ='=>$_POST['witsesId']]);
			$detailId = $query->all()->ToArray();
			$this->set(compact('detailId'));
			
		}
	}
}
