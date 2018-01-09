<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class RegistController extends AppController
{

	public function initialize()
	{
		parent::initialize();
		$this ->loadmodel('users');
		$this ->loadmodel('facilities');
		$this ->loadmodel('facility_classes');
		$this->loadComponent('PassHash');
		$this->loadComponent('MakeId9');
	}

	public function index()
	{
		$user = $this->Userinfo->getuser();

		$queryUsers = $this->users->get($user['id'], ['contain' => ['facilities', 'facilityClasses']]);
		$this->set('user', $queryUsers->toArray());

		if ($this->request->is('ajax')) {
			$this->autoRender = FALSE;
			$mailAddCount = $this->users->find('all')
			->where(['email LIKE' => $this->request->getData('email')])
			->toArray();
			$mailAddCount = count($mailAddCount);
			echo $mailAddCount;
		}
	}
	public function confirm(){
		if ($this->request->is('post')) {
			$postname = htmlentities($_POST['name']);
			$posthurigana = htmlentities($_POST['hurigana']);
			$postmail = htmlentities($_POST['email']);
			$postpass = $this->PassHash->hash($_POST['password']);
			$postfacilitie = $_POST['facilities'];
			$postfClassId = $_POST['fClassId'];

			$query = $this->facilities->find()
			->where(['name like' => $postfacilitie])
			->toArray();
			$fnamearray = array_shift($fnamearray);
			$this->set(compact('fnamearray'));

			if (!empty($_POST['flg'])) {
				$query = $this->users->query();
				$query->insert([
					'id','email','name','facilities_id','facility_classes_id','hurigana','password','Del_flg'
				])
				->values([
					'id' => $this->MakeId9->id9('use'),
					'email' => $postmail,
					'name' => $postname,
					'facilities_id' => $postfacilitie,
					'facility_classes_id' => $postfClassId,
					'hurigana' => $posthurigana,
					'password' => $postpass,
					'Del_flg' => 0
				]);
				$query->execute();

				$this->redirect(['controller' => 'TopPage', 'action' => 'index']);
			}
		}

	}

}
