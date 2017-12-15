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

		if(isset($_FILES)&& isset($_FILES['upload_gazo']) ){
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
			// $asd = basename($_FILES['upload_gazo']['name']);
			$name_id = $name_id;
			$path_parts = pathinfo(basename($_FILES['upload_gazo']['name']));
			echo $filename = ".".$path_parts['extension'], "\n"."<br>";
			echo $zxc = $name_id."_".$name_ren.$filename."<br>";



			$a = 'img/workshop/' . $name_id."_".$name_ren.$filename;
		    if(move_uploaded_file($_FILES['upload_gazo']['tmp_name'], $a)){
		        $msg = $a. 'のアップロードに成功しました';
		    }else {
		        $msg = 'アップロードに失敗しました';
		    }
		}
		$cnt = 1;
		$name_ren = $name_ren + 1;
		while (isset($_POST['text'.$cnt])) {
			if(isset($_FILES)&& isset($_FILES['upload_gazo'.$cnt]) && is_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'])){
				$path_parts = pathinfo(basename($_FILES['upload_gazo'.$cnt]['name']));
				$filename = ".".$path_parts['extension'];
				$a = 'img/workshop/' . $name_id."_".$name_ren.$filename;
			    if(move_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'], $a)){
			        $msg = $a. 'のアップロードに成功しました';
			    }else {
			        $msg = 'アップロードに失敗しました';
			    }
			}
			$cnt = $cnt + 1;
			$name_ren = $name_ren + 1;
		}


		if (isset($_FILES['upfile']['error']) && is_int($_FILES['upfile']['error'])) {
        // バッファリングを開始
        ob_start();
	        try {
	            switch ($_FILES['upfile']['error']) {
	                case UPLOAD_ERR_OK: // OK
	                    break;
	                case UPLOAD_ERR_NO_FILE:   // 未選択
	                    throw new RuntimeException('ファイルが選択されていません', 400);
	                case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
	                    throw new RuntimeException('ファイルサイズが大きすぎます', 400);
	                default:
	                    throw new RuntimeException('その他のエラーが発生しました', 500);
	            }
	            if (!$info = @__**getimagesize**__($_FILES['upfile']['tmp_name'])) {
	                throw new RuntimeException('有効なファイルを指定してください', 400);
	            }
				// file_get_contents($_FILES['upfile']['tmp_name']);
			} catch (RuntimeException $e) {

	            while (ob_get_level()) {
	                ob_end_clean(); // バッファをクリア
	            }
	            http_response_code($e instanceof PDOException ? 500 : $e->getCode());
	            $msgs[] = ['red', $e->getMessage()];

	        }
		}
    }

}
