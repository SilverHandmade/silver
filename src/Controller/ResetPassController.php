<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;

use Ramsey\Uuid\Uuid;
use Moontoast\Math\BigNumber;

class ResetPassController extends AppController
{

    public function initialize()
    {
        parent::initialize();
		$this->loadmodel('Users');
		$this->loadmodel('Unique_ids');
		$this->loadmodel('product_detailses');//試し
        $this->loadComponent('PassHash');
    }

	public function mailpass()
    {
		// 返された理由の表示
		if($this->request->is('post')) {
			if($_POST['flg'] == 1){
				$this->Flash->error(__('ドメインが入力されていません'));
			}elseif ($_POST['flg'] == 2) {
				$this->Flash->error(__('リンクの消費期限が切れています'));
		}
	}


		// $timestamp = strtotime( "+15 minute" , $today ) ;



	}

	public function respass()
	{
		// @があれば↑(進む)、なければ↓(返す)
		if(strpos($_POST['email'],'@') !== false ){
			$link = 'action="https://sh-ml.mybluemix.net/mail"';
			$link.= 'target="form1">';
		}else {
			$link = 'action="http://localhost/silver/resetpass/mailpass"';
			$link.= 'target="_parent">';
			$link.= '<input type="hidden" name="flg" value="1">';
		}
		$this->set("link", $link);

		// UUIDの作成
		$uuid = Uuid::uuid4();
		$this->set("a", $uuid);

		// 入力されているemailで登録してるユーザがあるか
		$Tb = TableRegistry::get('users');
		$query = $Tb->find();
		$ret = $query->select(['id','cnt' => $query->func()->count('*')])
					->where(['email'=>$_POST['email']])->first();
		// 存在すれば、再設定用テーブルに挿入
		if($ret->cnt >= 1){
			$Uid = $ret->id;
			$Tb = TableRegistry::get('unique_ids');
			$query = $Tb->query();
			$query->insert([
				'user_id','uuid'
			])
			->values([
				'user_id' => $Uid,
				'uuid' => $uuid
			])
			->execute();
		}
	}

	public function passchange()
	{
		// GETにデータがあれば(メールから来ている)
		if ($this->request->is('get')) {

			$uuid = $_GET['uu'];
			$Tb = TableRegistry::get('unique_ids');
			$query = $Tb->find();
			$ret = $query->select(['user_id','cnt' => $query->func()->count('*'),'sendtime'])
	        			->where(['uuid'=> $uuid ])->first();
			// 時間計算(15分)
			$tmp = $ret->sendtime;
			$DBtime = date("YmdHis", strtotime($ret->sendtime));
			$NowTime = date("YmdHis");
			$sa = $NowTime - $DBtime;
			IF($sa <= 1500){
				echo $sa_flg = 1;
			}else {
				echo $sa_flg = 2;
			}
			$this->set("sa", $sa_flg);
			// 1つ以上あればpostようにset
			if(isset($ret->cnt)){
				$Uid = $ret->user_id;
				$this->set("b", $Uid);
				// echo "ok";
			}else {
				// 一つもなければ
				echo "リンクが正しくありません1";
			}
		}elseif ($this->request->is('post')) {
			$uuid = $_POST['uu'];
			$Tb = TableRegistry::get('unique_ids');
			$query = $Tb->find();
			$ret = $query->select(['user_id','sendtime'])
	        			->where(['uuid'=> $uuid ])->first();
			// 時間計算(15分)
			$tmp = $ret->sendtime;
			$DBtime = date("YmdHis", strtotime($ret->sendtime));
			$NowTime = date("YmdHis");
			$sa = $NowTime - $DBtime;
			IF($sa <= 1500){
				echo $sa_flg = 1;
			}else {
				echo $sa_flg = 2;
			}
			$this->set("sa", $sa_flg);
			$Uid = $_POST['id'];
			$Pas = $_POST['password'];
			$RPas = $_POST['repassword'];
			$this->set("b", $Uid);
			// 上から数字・小文字・大文字があるか
			$inte = preg_match("/[0-9]/",$Pas);
			$lit = preg_match("/[a-z]/",$Pas);
			$lag = preg_match("/[A-Z]/",$Pas);
			// 文字種が何種類あるか
			$mozisyu = $inte + $lit + $lag;
			if($sa_flg == 1){
				// 両方が空白でない & 再入力と同じ & 文字数が6~20 & 文字種が2種以上 &15分以内
				if(($Pas <> "" && $RPas <> "") && $Pas == $RPas && strlen($Pas) >=6 && strlen($Pas) <=20 && $mozisyu >= 2){
					$HHs = $this->PassHash->hash($_POST['password']);
					$query = ConnectionManager::get('default');
					$query->update('users',['password' => $HHs],['id' => $Uid]);
					$Tb = TableRegistry::get('unique_ids');
					$query = $Tb->query();
					$query->delete()
					->where([
						'user_id' => $Uid,
					])
					->execute();
					$this->Flash->error(__('パスワードが変更されました。'));
				}else {
					$this->Flash->error(__('入力が正しくありません。再度入力してください。'));
					// $this->set("temp", $temp);

				}
			}else {
				$this->Flash->error(__('リンクの消費期限が切れています＾＾'));
			}
		}else {
			echo "リンクが正しくありません2";
		}

	}


    public function index()
    {
		if ($this->request->is('post')) {
			$session = $this->request->session();
			$Uid = $session->read('id');
			// 現在のパス比較
			$OPas = $this->request->getData('oldpassword');
			$Tb = TableRegistry::get('users');
			$query = $Tb->find();
			$ret = $query->select(['id','password'])
						->where(['id'=> $Uid])->first();
			$hasher = new DefaultPasswordHasher();
			if($hasher->check($OPas, $ret->password)){
			  	$Pflg = 1;
			}else{
				$Pflg = 0;
			}
			// フォームから取得
			$Pas = $this->request->getData('password');
			$RPas = $this->request->getData('repassword');
			$HHs = $this->PassHash->hash($this->request->getData('password'));
			// 上から数字・小文字・大文字があるか
			$inte = preg_match("/[0-9]/",$Pas);
			$lit = preg_match("/[a-z]/",$Pas);
			$lag = preg_match("/[A-Z]/",$Pas);
			// 文字種が何種類あるか
			$mozisyu = $inte + $lit + $lag;
					// デバッグ用
					// echo '<br><br><br><br><br><br>';
					// echo '<br>0_'.$OPas.'<br>1_'.$Pas.'<br>'.'2_'.$RPas.'<br>'.'ID_'.$Uid.'<br>'.'hs_'.$HHs;
                    //
					// echo '<br>文字数_'.strlen($Pas).'<br>PWflg_'.$Pflg;
					// echo '<br>数値'.$inte.'<br>小文字'.$lit.'<br>大文字'.$lag.'<br>文字種'.$mozisyu;
					// ここまで
			// 両方が空白でない & 再入力と同じ & 現在のPWが同じ & 文字数が6~20 & 文字種が2種以上
			if(($Pas <> "" && $RPas <> "") && $Pas == $RPas && $Pflg == 1 && strlen($Pas) >=6 && strlen($Pas) <=20 && $mozisyu >= 2){
				// echo '<br>'.'変更おk';
				$query = ConnectionManager::get('default');
				$query->update('users',['password' => $HHs],['id' => $Uid]);
				$this->Flash->error(__('パスワードが変更されました。'));
			}else {
			// echo '<br>'.'変更NG';
			$this->Flash->error(__('入力が正しくありません。再度入力してください。'));
			}
		}

		// $validate = array(
		// 	'password' => array(
		// 		'rule'    => array('between', 8, 20),
		// 		'message' => '8〜20文字でよろしく'
		// 	)
		// );
	}


}
