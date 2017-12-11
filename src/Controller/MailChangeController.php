<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

use Ramsey\Uuid\Uuid;
use Moontoast\Math\BigNumber;

class MailchangeController extends AppController
{

    public function initialize()
    {
        parent::initialize();
		$this->loadmodel('Users');
		$this->loadmodel('change_mails');
    }

	public function index()
    {
		if($this->request->is('post')) {
			if($this->request->getData('flg') == 2) {
				$this->Flash->error(__('リンクの消費期限が切れています'));
			}
		}
		$session = $this->request->session();
		$Uid = $session->read('id');
		$Tb = TableRegistry::get('users');
		$query = $Tb->find();
		$ret = $query->select(['id','email'])
					->where(['id'=> $Uid])->first();
		$this->set("meado", $ret->email);
    }

public function mailsend()
	{

		if(strpos($_POST['new_email'],'@') !== false){
			$link = 'action="https://sh-ml.mybluemix.net/change"';
			$link.= 'target="form1">';
		}else {
			$link = 'action="http://localhost/silver/mailchange"';
			$link.= 'target="_parent">';
			$link.= '<input type="hidden" name="flg" value="1">';
		}
		$this->set("link", $link);
		// UUIDの作成
		$uuid = Uuid::uuid4();
		$this->set("a", $uuid);

		$session = $this->request->session();
		$Uid = $session->read('id');
		$Tb = TableRegistry::get('users');
		$query = $Tb->find();
		$ret = $query->select(['id','cnt' => $query->func()->count('*'),'email'])
					->where(['id'=> $Uid])->first();

		$cnt = 1;
		$Tb = TableRegistry::get('change_mails');
		$query = $Tb->find();
		$ret_cnt = $query->select(['change_id','cnt' => $query->func()->count('*'),'m_mail'])
					->where(['user_id'=> $Uid])->first();
		if($ret_cnt->cnt >= 1){
			// 2回目以上の変更の場合
			$cnt = $ret_cnt->cnt + 1;
		}
		$ret_kan = $query->select(['change_id','cnt' => $query->func()->count('*'),'m_mail'])
					->where(['user_id'=> $Uid ,'kan_flg'=> 0])->first();
		if($ret_kan->cnt == 0){
			// kan_flg=0が0つなら
			$Tb = TableRegistry::get('change_mails');
			$query = $Tb->query();
			$query->insert([
				'user_id','change_id','m_mail','c_mail','uuid'
			])
			->values([
				'user_id' => $Uid,
				'change_id' => $cnt,
				'm_mail' => $ret->email,
				'c_mail' => $this->request->getData('new_email'),
				'uuid' => $uuid
			])
			->execute();
		}else {
			// kan_flg=0が1つ以上あったら
			$query = ConnectionManager::get('default');
			$query->update('change_mails',
				['uuid' => $uuid ,'c_mail' => $this->request->getData('new_email'),'change_time' => null],
				['user_id' => $Uid ,'kan_flg'=> 0]);
		}

	}

	public function mailcomp()
	{
		if($this->request->is('get')) {
			$uuid = $_GET['uu'];
			$Tb = TableRegistry::get('change_mails');
			$query = $Tb->find();
			$ret = $query->select(['user_id','c_mail','change_time'])
	        			->where(['uuid'=> $uuid ,'kan_flg'=> 0])->first();
			$Uid = $ret->user_id;
			// 時間計算(15分)
			$DBtime = date("YmdHis", strtotime($ret->change_time));
			$NowTime = date("YmdHis");
			echo $sa = $NowTime - $DBtime;
			IF($sa <= 1500){
				$sa_flg = 1;
			}else {
				$sa_flg = 2;
			}
			$this->set("sa", $sa_flg);
			if($sa_flg == 1){
				if(isset($ret->user_id)){
					$query = ConnectionManager::get('default');
					$query->update('users',
						['email' => $ret->c_mail],
						['id' => $Uid ]);
					$query->update('change_mails',
						['uuid' => null ,'kan_flg' => 1],
						['uuid' => $uuid ]);
				}else {
					// 一つもなければ
					echo "リンクが正しくありません1";
				}
			}
		echo "リンクが正しくありません2";
		}
	}

}
