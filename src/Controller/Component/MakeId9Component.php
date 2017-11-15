<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class MakeId9Component extends Component {

	//initializeに入れる↓
	//$this->loadComponent('MakeId9');

	//$a=$this->MakeId9->id9('req');　　id9('テーブル名頭3文字')
	public function id9($tbl) {
		$flg = True;
		if($tbl == 'req'){
			$kt = 6;
			$MTb = TableRegistry::get('requests');
		}elseif($tbl == 'use'){
			$kt = 6;
			$MTb = TableRegistry::get('users');
		}elseif($tbl == 'pro'){
			$kt = 5;
			$MTb = TableRegistry::get('products');
		}elseif($tbl == 'mov' ){
			$kt = 5;
			$MTb = TableRegistry::get('movies');
		}else {
			$flg = False;
		}
		if($flg){
			$query = $MTb->find();
	      	$ret = $query->select(['max_id' => $query->func()->max('id')])->first();
	      	$showtbl = $ret->max_id;
			$ym = $this->ymdate();//yymm取得
			if(round($showtbl/10**$kt,0) == $ym){
        		$showtbl = $showtbl +1;
    		}elseif($kt == 6){
    			$showtbl = $ym.'000001';
    		}else {
    			$showtbl = $ym.'00001';
    		}
		}
    return $showtbl;
	}

	public function ymdate()
    {
      	date_default_timezone_set('UTC');
      	$dt = date("ym");//yymm生成
      	return $dt;
    }
}


//SELECT id
//from $table
//LIKE 'yymm%'