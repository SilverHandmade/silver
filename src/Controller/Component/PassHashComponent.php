<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Auth\DefaultPasswordHasher;

class PassHashComponent extends Component {
	public function hash($pass) {
		$hasher = new DefaultPasswordHasher();
		return $hasher->hash($pass);
	}
	// パスワードチェック
	public function pasCheck($inputPass, $databasePass) {
		$hasher = new DefaultPasswordHasher();
		return $hasher->check($inputPass, $databasePass);
	}

}
