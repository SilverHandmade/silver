<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class ResetPassController extends AppController
{

    public function initialize()
    {
        parent::initialize();
		$this->loadmodel('Users');
        $this->loadComponent('PassHash');
    }

	public function mailpass()
    {


	}
	
    public function index()
    {
		if ($this->request->is('post')) {
			$session = $this->request->session();
			$Uid = $session->read('id');
			$OPas = $this->request->getData('oldpassword');
			$Pas = $this->request->getData('password');
			$RPas = $this->request->getData('repassword');
			$HHs = $this->PassHash->hash($this->request->getData('password'));
			echo '<br><br><br><br><br>';
			echo '1_'.$Pas.'<br>'.'2_'.$RPas.'<br>'.'ID_'.$Uid.'<br>'.'hs_'.$HHs;

			echo '<br>_'.mb_substr($Pas, -3).'<br>'.strlen($Pas);
			echo 'https://sh-ml.mybluemix.net/mail';

				if($Pas == $RPas){
					echo '<br>'.'1';
					$query = ConnectionManager::get('default');
					$query->update('users',['password' => $HHs],['id' => $Uid]);

					//debug($query);
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
