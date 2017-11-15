<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class VideoController extends AppController
{

    public function initialize()
    {
        parent::initialize();
		$session = $this->request->session();
		if (!$session->read('loginFlg')) {
			$this->redirect(['controller' => 'login', 'action' => 'index']);
		}

		$this->loadmodel('Movies');

    }
    public function index()
    {
		$queryMov = $this->Movies->find();
		if ($this->request->is('POST')) {
			$queryMov->contain();
			// ->select('title');

			if (!empty($this->request->getData('title'))) {
				$queryMov->where(['title LIKE' => '%' . $this->request->getData('title') . '%']);
			}
			if (!empty($this->request->getData('videoId'))) {
				$queryMov->where(['id' => $this->request->getData('videoId')]);
			}
			if (!empty($this->request->getData('uploader'))) {
				$queryMov->where(['user_id' => $this->request->getData('uploader')]);
			}
			if (!empty($this->request->getData('kyeWord'))) {
				$queryMov->where(['description like' => '%' . $this->request->getData('kyeWord') . '%']);
			}

			$this->set('results', $queryMov->toArray());
		} else {
			$this->set('results', $queryMov->all(20)->toArray());
		}

	}
	public function view()
	{


	}
}
