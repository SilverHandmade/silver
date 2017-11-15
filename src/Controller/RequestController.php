<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;

class RequestController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadmodel('Products');
        $this->loadmodel('Facilities');
		/*$session = $this->request->session();
		if (!$session->read('loginFlg')) {
			$this->redirect(['controller' => 'login']);
		}*/
    }
    public function create()
    {
	  if ($this->request->is('post')){
	  $faci_name = $_POST['facility_name'];
	  $faci_address = $_POST['facility_address'];
	  $faci_id = $_POST['facility_id'];
  	}
    }
    public function index(){
      $query = $this->Facilities->find()
      ->select(['id','name','address'])
      ->where(['facility_classes_id ='=>2]);
      $facilities = $query->all()->ToArray();
      $jsonResults = json_encode($facilities);
      $this->set(compact('facilities'));

    }

	public function proof(){
		$query = $this->Products->find()
		->select(['id']);
		$results = $query->all()->ToArray();
		$jsonResults = json_encode($results);
		$this->set(compact('results'));
		if ($this->request->is('post')){
			$input_title = $_POST['requestT'];
			$input_num = $_POST['requestN'];
			$input_date = $_POST['requestD'];
		  if ($input_ws = $_POST['wsID']) {
			if ($input_ws != "") {
			  foreach ($results as $value) {
				$value = preg_replace('/[^0-9]/', '', $value);
				  if ($input_ws === $value) {
					break;
				  }
				  if(!next($results)){
					// 一致しなかった場合
					$uri = $_SERVER['HTTP_REFERER'];
					header("Location: ".$uri);
					$this->Flash->error(__('ワークショップIDが間違っています。'));

				  }
			  }
			}
		  }
		}
	}


}
            /*if ($input_title = $_POST['requestT'] and $input_num = $_POST['requestN'] and $input_date = $_POST['requestD']) {
        			$input_ws = $_POST['wsID'];

        		    echo ("<input type='text' size='8' name='name1' value='$input_title'>");
        				echo ("<input type='text' size='8' name='name2' value='$input_num'>");
        				echo ("<input type='text' size='8' name='name3' value='$input_date'>");
        				if ($input_ws != "") {
        					foreach ($results as $value) {
        						$value = preg_replace('/[^0-9]/', '', $value);
        							if ($input_ws === $value) {
        								echo ("<input type='text' size='8' name='name4' value='$input_ws'>");
        								break;
        							}
        							if(!next($results)){
        								echo "ワークショップIDが間違っています。"; // 一致しなかった場合
        							}
        					}



        				}else {
        					echo ("<input type='text' size='8' name='name4' value='ないお'>");
        				}
        		}else{
        		    echo ("<input type='text' size='8' name='name1' value='未入力'>");
        				echo ("必須項目が入力されていません");
        		}
          }
    }*/
