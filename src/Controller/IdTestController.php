<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

class IdTestController extends AppController
{

    public function initialize()
	{
        parent::initialize();
    }

    public function index() {

		if(isset($_FILES)&& isset($_FILES['upload_gazo']) && is_uploaded_file($_FILES['upload_gazo']['tmp_name'])){
		    $a = 'img/workshop/' . basename($_FILES['upload_gazo']['name']);
		    if(move_uploaded_file($_FILES['upload_gazo']['tmp_name'], $a)){
		        $msg = $a. 'のアップロードに成功しました';
		    }else {
		        $msg = 'アップロードに失敗しました';
		    }
		}
		$cnt = 1;
		$gazo_name = 'upload_gazo'.$cnt;
		echo "<br><br><br><br><br><br>".$gazo_name."<br>";
		while (isset($_POST['text'.$cnt])) {
			if(isset($_FILES)&& isset($_FILES['upload_gazo'.$cnt]) && is_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'])){
			    $a = 'img/workshop/' . basename($_FILES['upload_gazo'.$cnt]['name']);
			    if(move_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'], $a)){
			        $msg = $a. 'のアップロードに成功しました';
			    }else {
			        $msg = 'アップロードに失敗しました';
			    }
			}
			$cnt = $cnt + 1;
			$gazo_name = 'upload_gazo'.$cnt;
			echo $gazo_name;
		}

    }

}
