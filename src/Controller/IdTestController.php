<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

use Cake\ORM\Table;

class IdTestController extends AppController
{

    public function initialize()
	{
        parent::initialize();
		$this->loadmodel('products');
		$this->loadmodel('product_detailses');
    }

    public function index() {

		if(isset($_FILES)&& isset($_FILES['upload_gazo']) && is_uploaded_file($_FILES['upload_gazo']['tmp_name'])){
			echo "<br><br><br><br><br><br>";
			$Tb = TableRegistry::get('products');
			$query = $Tb->find();
			$ret = $query->select(['max_id' => $query->func()->max('id')])->first();
			$name_id = $ret->max_id;
			$Tb_d = TableRegistry::get('product_detailses');
			$query = $Tb_d->find();
			$ret_d = $query->select(['id' => $query->func()->max('ren')])
	        			->where(['product_id'=> $name_id])->first();
			if(isset($ret_d->id)){
				$name_ren = $ret_d->id;
			}
			echo $name_id."-".$name_ren.basename($_FILES['name']);



			$a = 'img/workshop/' . basename($_FILES['upload_gazo']['name']);
		    if(move_uploaded_file($_FILES['upload_gazo']['tmp_name'], $a)){
		        $msg = $a. 'のアップロードに成功しました';
		    }else {
		        $msg = 'アップロードに失敗しました';
		    }
		}
		$cnt = 1;
		$gazo_name = 'upload_gazo'.$cnt;
		echo $gazo_name."<br>";
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
