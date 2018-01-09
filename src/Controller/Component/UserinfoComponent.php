<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class UserinfoComponent extends Component {
	public function setname() {
		$session = $this->request->session();

		$adminFlg = False;
		// セッション情報取得
		if (!empty($session->read('Auth'))) {
			if ($session->read('Auth.User.facilities_id') == 999999) {
				$adminFlg = True;
			}
			$user = array(
				'id' => $session->read('Auth.User.id'),
				'name' => $session->read('Auth.User.name'),
				'action' => 'logout',
				'tranceName' => 'ログアウト',
				'adminFlg' => $adminFlg,
				'loginFlg' => True
			);
		} else {
			$user = array(
				'name' => 'ゲスト',
				'action' => 'index',
				'tranceName' => 'ログイン',
				'adminFlg' => $adminFlg,
				'loginFlg' => False
			);
		}
		return $user;
	}

	public function getuser() {
		$session = $this->request->session();
		// セッション情報取得
		if (!empty($session->read('Auth'))) {
			return $session->read('Auth.User');
		} else {
			return null;
		}
	}
}
