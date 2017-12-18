<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Mailer\Email;

class MailController extends AppController
{



    public function initialize()
    {
        parent::initialize();

		$this->loadComponent('MakeId9');

		$this ->loadmodel('questions');
		$this ->loadmodel('users');
		$session = $this->request->session();

		//ログインチェック
		if (empty($session->read('Auth'))) {
			$this->redirect(['controller' => 'login', 'action' => 'index', 'ref' => $this->name]);
		}
    }


    public function index() {

		if (isset($_POST['transmission'])) {
			$email = new Email('default');
			$email->from(['Taguchi.SilverHandmade@gmail.com' => '田口　恵太郎'])
				->to($_SESSION['userID'])
				->subject($_POST['subjectbox'])
				->send($_POST['text']);
		}

		$question = $this->questions->find('all');
        $questionArray = $question->toArray();
        $this->set(compact('questionArray'));

		if($this->request->is('post')) {
			$postQId = $this->MakeId9->id9('que');
			$postSub = htmlentities($_POST['subjectbox']);
			$postText = htmlentities($_POST['text']);
			$postUId = $_SESSION['id'];
			//echo "<br><br><br><br>" . $;
	  	}
		if (!empty($_POST['flg'])) {
			$query = $this->questions->query();
			$query->insert([
				'id','title','questcont','user_id'
			])
			->values([
				'id' => $postQId,
				'title' => $postSub,
				'questcont' => $postText,
				'user_id' => $postUId
			])
			->execute();
		}
    }
}
