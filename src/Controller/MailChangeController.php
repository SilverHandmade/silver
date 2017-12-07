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
	public function index()
    {
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
		if(strpos($_POST['n_email'],'@') !== false){
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
		$ret_cnt = $query->select(['change_id','cnt' => $query->func()->count('*'),'email'])
					->where(['id'=> $Uid])->first();
		if($ret_cnt->cnt >= 1){
			$cnt = $ret_cnt->cnt + 1;
		}


		$Tb = TableRegistry::get('change_mails');
		$query = $Tb->query();
		$query->insert([
			'user_id','change_id','m_mail','c_mail','uuid'
		])
		->values([
			'user_id' => $Uid,
			'change_id' => $cnt,
			'm_mail' => $ret->email,
			'c_mail' => ,
			'uuid' => $uuid
		])
		->execute();

	}


	public function mailcomp()
	{

	}
}
