<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

class VideoController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$session = $this->request->session();
		// if (empty($session->read('Auth'))) {
		// 	$this->redirect(['controller' => 'login', 'action' => 'index', 'ref' => $this->name]);
		// }
		$this->loadmodel('Movies');
		$this->loadComponent('MakeId9');
	}
	public function index()
	{
		$queryMov = $this->Movies->find();
		if ($this->request->is('ajax')) {
			if (!empty($this->request->getData('title'))) {
				$queryMov->where(['title LIKE' => '%' . $this->request->getData('title') . '%']);
			}
			if (!empty($this->request->getData('videoId'))) {
				$queryMov->where(['id' => $this->request->getData('videoId')]);
			}
			if (!empty($this->request->getData('uploader'))) {
				$queryMov->where(['user_id' => $this->request->getData('uploader')]);
			}
			if (!empty($this->request->getData('kyeWord'))) {
				$queryMov->where(['description like' => '%' . $this->request->getData('kyeWord') . '%']);
			}
			if (!empty($this->request->getData('term'))) {
				$now = Time::now();
				$args = Time::now();;
				$args->subDays($this->request->getData('term'));
				$queryMov
					->where(function ($exp, $q) use ($args, $now) {
						return $exp->between('contribution', $args, $now);
					});
			}
			$this->set('results', $queryMov->toArray());
        	$this->render("/Element/video/videoSerchResult");
		} else {
			$this->set('results', $queryMov->limit(20)->toArray());
		}
	}

	public function view()
	{
		$geVideo = $this->Movies->get($this->request->getParam('id'));
		$this->set('video', $geVideo->toArray());
	}
	public function upload()
	{
		if(isset($_FILES)&& isset($_FILES['upload_gazo']) && is_uploaded_file($_FILES['upload_gazo']['tmp_name'])){

			$MId = $this->MakeId9->id9('mov');
			$user = $this->Userinfo->getuser();


			// // 名前変更のためのIDと連番の取得(各テーブルで自由に変更を)
			// $Tb = TableRegistry::get('movies');
			// $query = $Tb->find();
			// $ret = $query->select(['max_id' => $query->func()->max('id')])->first();
			// $name_id = $ret->max_id;


			//ファイル名取得
			$path_parts = pathinfo(basename($_FILES['upload_gazo']['name']));
			// 拡張子の取得
			$filename = ".".$path_parts['extension'];
			// ID_連番.拡張子の文字結合
			$rennketu_name = $MId.$filename;
			// メディアの出力先
			$a = $_SERVER["HTTP_HOST"].'/'.'mov/' . $rennketu_name;

			// なくてもアップロードできる
			if(move_uploaded_file($_FILES['upload_gazo']['tmp_name'], $a)){
				$msg = $a. 'のアップロードに成功しました';
			}else {
				$msg = 'アップロードに失敗しました';
			}

			$Tb = TableRegistry::get('movies');
			$query = $Tb->query();
			$query->insert([
				'id','title','description','movie_url','user_id'
			])
			->values([
				'id' => $MId,
				'title' => $this->request->getData('name'),
				'description' => $this->request->getData('text'),
				'movie_url' => $rennketu_name,
				'user_id' =>$user['id']
			])
			->execute();

		}


		// $cnt = 1;
		// if(isset($name_ren)){
		// 	$name_ren = $name_ren + 1;
		// }
        //
		// // 複数ある場合の繰り返し
		// while (isset($_POST['text'.$cnt])) {
		// 	if(isset($_FILES)&& isset($_FILES['upload_gazo'.$cnt]) && is_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'])){
		// 		$path_parts = pathinfo(basename($_FILES['upload_gazo'.$cnt]['name']));
		// 		$filename = ".".$path_parts['extension'];
		// 		$rennketu_name = $name_id."_".$name_ren.$filename;
		// 		$a = 'img/workshop/' . $rennketu_name;
		// 		if(move_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'], $a)){
		// 			$msg = $a. 'のアップロードに成功しました';
		// 		}else {
		// 			$msg = 'アップロードに失敗しました';
		// 		}
		// 	}
		// 	$cnt = $cnt + 1;
		// 	$name_ren = $name_ren + 1;
		// }
	}
}
