<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class TopPageController extends AppController
{

    public function initialize()
    {
		// throw new ForbiddenException();

        parent::initialize();
		$this->loadmodel('Requests');
		$this->loadmodel('Facilities');
		$this->loadmodel('Products');
		$this->loadmodel('Witses');
    }


    public function index() {
		$user = $this->Userinfo->getuser();

		$queryRequest = $this->Requests->find()->contain('Facilities')
		->select(['id', 'Requests.title', 'Requests.To_date', 'Facilities.name', 'Requests.kan_flg', 'Requests.Del_flg'])
		->where(['Requests.kan_flg' => 0, 'Requests.Del_flg' => 0])
		// ->order(['Requests.To_date' => 'DESC'])
		->limit(4);
		if ($user['facility_classes_id'] == 1) {
			$queryRequest->where(['Requests.F_moto_id' => $user['facilities_id']]);
		} else {
			$queryRequest->where(['Requests.F_saki_id' => $user['facilities_id']]);
		}
		$request = $queryRequest->toArray();
		$this->set(compact('request'));

		$queryWorkShop = $this->Products->find()
		->select(['id', 'name', 'midasi_url', 'Postdate'])
		->order(['Postdate' => 'DESC'])
		->limit(4)->all();
		$workshop = $queryWorkShop->toArray();
		$this->set(compact('workshop'));

		$queryWitses = $this->Witses->find()
		->select(['id', 'title', 'Postdate'])
		->order(['Postdate' => 'DESC'])
		->limit(4)->all();
		$witses = $queryWitses->toArray();
		$this->set(compact('witses'));

    }
}
