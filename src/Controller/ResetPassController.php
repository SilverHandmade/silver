<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ResetPassController extends AppController
{

    public function initialize()
    {
        parent::initialize();
		$this->loadmodel('Users');
        $this->loadComponent('PassHash');
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
			echo '<br><br><br><br>';
			echo $Pas.'<br>'.$RPas.'<br>'.$Uid.'<br>'.$HHs;
			if($Uid == 1){
				if($Pas == $RPas){
					echo '<br>'.'1';
					$query = ConnectionManager::get('default');
					$query->update('users',['password' => $HHs],['id' => $Uid]);
					//->execute()
				}else {
					echo '<br>'.'0';
				}
			}



		}




	}

}
