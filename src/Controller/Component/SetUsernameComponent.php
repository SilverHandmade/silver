<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class SetUsernameComponent extends Component {
	public function setname() {
		$session = $this->request->session();
		// セッション情報取得
		if (!empty($session->read('username'))) {
			$user = array(
				'name' => $session->read('username'),
				'url' => '/silver/logout',
				'tranceName' => 'ログアウト',
				'registFlg' => NULL
			);
		} else {
			$user = array(
				'name' => 'ゲスト',
				'url' => '/silver/login',
				'tranceName' => 'ログイン',
				'registFlg' => NULL
			);
		}
		return $user;
	}
}
