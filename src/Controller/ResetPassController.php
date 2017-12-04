<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

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
			if($_POST['flg'] = 1){
				$err= '<div id="form">';
				$err.= '<p>ドメインが入力されていません</p>';
				$err.= '</div>';
				$this->set("err", $err);
			}
		}
		// ここから
		// $proid = 171100001;
		// $Tb = TableRegistry::get('product_detailses');
		// $query = $Tb->query();
		// $query->insert([
		// 	'product_id','ren'
		// ])
		// ->values([
		// 	'product_id' => $proid,
		// 	'ren' => call pdren('171100001')
		// ])
		// echo "<br><br><br><br><br><br><br>".$query;
		// ->execute();
		// debug($query);
		// ここまで試し
	}

	public function respass()
	{
		// @があれば↑(進む)、なければ↓(返す)
		if(strpos($_POST['email'],'@') !== false){
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

	public function mailchange()
	{
		// GETにデータがあれば(メールから来ている)
		// echo "<br><br><br><br><br><br><br><br>";
		if ($this->request->is('get')) {
			$uuid = $_GET['uu'];
			$Tb = TableRegistry::get('unique_ids');
			$query = $Tb->find();
			$ret = $query->select(['user_id','cnt' => $query->func()->count('*')])
	        			->where(['uuid'=> $uuid ])->first();
			// echo $ret->user_id;
			// 1つ以上あればpostようにset
			if(isset($ret->cnt)){
				$Uid = $ret->user_id;
				$this->set("b", $Uid);
				// echo "ok";
			}else {
				echo "リンクが正しくありません1";
			}
		}elseif ($this->request->is('post')) {
			$Uid = $_POST['id'];
			$Pas = $_POST['password'];
			$RPas = $_POST['repassword'];
			$HHs = $this->PassHash->hash($_POST['password']);
			if(($Pas <> "" || $RPas <> "") && $Pas == $RPas){
				$query = ConnectionManager::get('default');
				$query->update('users',['password' => $HHs],['id' => $Uid]);
				$Tb = TableRegistry::get('unique_ids');
				$data = $Tb->find()->where(['user_id' => $Uid])->first();
				echo '<br><br><br><br><br><br><br><br>'.$data;
				$Tb->delete($data)->where(['user_id' => $Uid]);
				$temp= '<div id="form">';
				$temp.= '<p>パスワードが再設定されました</p>';
				$temp.= '</div>';
				$this->set("temp", $temp);
			}else {
				$temp= '<body onload="document.F.submit();">';
				$temp.= '<form METHOD="POST" name="F" action="http://localhost/silver/resetpass/mailchange?uu=">';
				$temp.= '';
				$temp.= '</div>';
				$this->set("temp", $temp);
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
			$OPas = $this->request->getData('oldpassword');
			$Tb = TableRegistry::get('users');
			// パス比較
			$query = $Tb->find();
			$ret = $query->select(['user_id','password'])
						->where(['id'=> $_POST['id']])->first();

			$Pas = $this->request->getData('password');
			$RPas = $this->request->getData('repassword');
			$HHs = $this->PassHash->hash($this->request->getData('password'));
			// デバッグ用
			echo '<br><br><br><br><br>';
			echo '1_'.$Pas.'<br>'.'2_'.$RPas.'<br>'.'ID_'.$Uid.'<br>'.'hs_'.$HHs;

			echo '<br>_'.mb_substr($Pas, -3).'<br>'.strlen($Pas);
			// ここまで
				if(($Pas <> "" || $RPas <> "") && $Pas == $RPas){
					echo '<br>'.'1';
					$query = ConnectionManager::get('default');
					$query->update('users',['password' => $HHs],['id' => $Uid]);
				}else {
					echo '<br>'.'0';
				}
				// $validate = array(
				// 	'password' => array(
				// 		'rule'    => array('between', 8, 20),
				// 		'message' => '8〜20文字でよろしく'
				// 	)
				// );

		}


	}

}
