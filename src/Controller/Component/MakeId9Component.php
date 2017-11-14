<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class MakeId9Component extends Component {

	public function id9($tbl) {
		if($tbl == 'req')
			$TId ='requests';
		if($tbl == 'pro')
			$TId ='products';
		if($tbl == 'mov' )
			$TId ='movies';
		$showtbl = $this->MaxId($Tid)
    return $showtbl;
	}

	public function MaxId($TMId)
    {
      	$requests = TableRegistry::get($TMId);

      	// 新しいクエリーを始めます。
      	$query = $requests->find();
      	$ret = $query->select(['max_id' => $query->func()->max(1)])->first();
      	$id = $ret->max_id;
      	return $id;
    }
}


//SELECT id
//from $table
//LIKE 'yymm%'
