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
		echo "<br><br><br><br><br><br>";
		if(!$this->request->is('email')){
			echo mb_substr_count(strstr($this->request->getData('email'),'@'),".");
			echo "<br>".$this->request->getData('email');

		}


		if(isset($_FILES)&& isset($_FILES['upload_gazo']) && is_uploaded_file($_FILES['upload_gazo']['tmp_name'])){

			// 名前変更のためのIDと連番の取得(各テーブルで自由に変更を)
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
			//ファイル名取得
			$path_parts = pathinfo(basename($_FILES['upload_gazo']['name']));
			// 拡張子の取得
			$filename = ".".$path_parts['extension'];
			// ID_連番.拡張子の文字結合
			$rennketu_name = $name_id."_".$name_ren.$filename;
			// メディアの出力先
			$a = 'img/workshop/' . $rennketu_name;

			// なくてもアップロードできる
		    if(move_uploaded_file($_FILES['upload_gazo']['tmp_name'], $a)){
		        $msg = $a. 'のアップロードに成功しました';
		    }else {
		        $msg = 'アップロードに失敗しました';
		    }
		}


		$cnt = 1;
		if(isset($name_ren)){
			$name_ren = $name_ren + 1;
		}

		// 複数ある場合の繰り返し
		while (isset($_POST['text'.$cnt])) {
			if(isset($_FILES)&& isset($_FILES['upload_gazo'.$cnt]) && is_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'])){
				$path_parts = pathinfo(basename($_FILES['upload_gazo'.$cnt]['name']));
				$filename = ".".$path_parts['extension'];
				$rennketu_name = $name_id."_".$name_ren.$filename;
				$a = 'img/workshop/' . $rennketu_name;
			    if(move_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'], $a)){
			        $msg = $a. 'のアップロードに成功しました';
			    }else {
			        $msg = 'アップロードに失敗しました';
			    }
			}
			$cnt = $cnt + 1;
			$name_ren = $name_ren + 1;
		}


		// if (isset($_FILES['upload_gazo']['error']) && is_int($_FILES['upload_gazo']['error'])) {
        // // バッファリングを開始
        // ob_start();
	    //     try {
	    //         switch ($_FILES['upload_gazo']['error']) {
	    //             case UPLOAD_ERR_OK: // OK
		// 				echo "okだよん";
		// 				break;
	    //             case UPLOAD_ERR_NO_FILE:   // 未選択
	    //                 echo "ファイルがないよ？";
		// 				break;
	    //             case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
	    //                 echo "ファイルサイズがチョーカー";
		// 				break;
	    //             default:
	    //                 echo "なんかのえらー";
		// 				break;
	    //         }
		// 		// if(isset($_FILES)&& isset($_FILES['upload_gazo']) && is_uploaded_file($_FILES['upload_gazo']['tmp_name'])){
		// 			$name_ren =1;
		// 			$path_parts = pathinfo(basename($_FILES['upload_gazo'.$cnt]['name']));
		// 			$filename = ".".$path_parts['extension'];
		// 			$a = 'img/workshop/' . $name_id."_".$name_ren.$filename;
		// 			if(move_uploaded_file($_FILES['upload_gazo'.$cnt]['tmp_name'], $a)){
		// 				$msg = $a. 'のアップロードに成功しました';
		// 			}else {
		// 				$msg = 'アップロードに失敗しました';
		// 			}
		// 		// }
		// 		// file_get_contents($_FILES['upload_gazo']['tmp_name']);
		// 	} catch (RuntimeException $e) {
        //
	    //         while (ob_get_level()) {
	    //             ob_end_clean(); // バッファをクリア
	    //         }
	    //         http_response_code($e instanceof PDOException ? 500 : $e->getCode());
	    //         $msgs[] = ['red', $e->getMessage()];
        //
	    //     }
		// }
    }

}
