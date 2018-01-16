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

		// ログイン確認
		if (empty($this->Userinfo->getuser())) {
			$this->redirect(['controller' => 'login', 'action' => 'index']);
		}
    }


    public function index() {

		$user = $this->Userinfo->getuser();
		if (isset($_POST['transmission'])) {
			$sendText = $_POST['text'] . "\n\nの内容でお問い合わせを受け付けました。";
			$sendText .= "\n2～4営業年以内に返信いたします。";
			$email = new Email('default');
			$email->from(['Taguchi.SilverHandmade@gmail.com' => 'SilverHandmade'])
				->to($user['email'])
				->subject($_POST['subjectbox'])
				->send($sendText);
		}

		$question = $this->questions->find('all');
        $questionArray = $question->toArray();
        $this->set(compact('questionArray'));

		if($this->request->is('post')) {
			$postQId = $this->MakeId9->id9('que');
			$postSub = htmlentities($_POST['subjectbox']);
			$postText = htmlentities($_POST['text']);
			$postUId = $user['id'];
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
