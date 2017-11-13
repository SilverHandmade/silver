<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class MakeId9Component extends Component {

	public function id9() {
    $id = '9けたのID';
    return $id . $test;
	}
}


//SELECT id
//from $table
//LIKE 'yymm%'
