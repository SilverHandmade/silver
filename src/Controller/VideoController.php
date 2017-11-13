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
		$this->loadmodel('Movies');

    }
    public function index()
    {
		if ($this->request->is('POST')) {
			$queryMov = $this->Movies->find()->select('title');
			$queryMov->where(['title LIKE' => '%' . $this->request->getData('title') . '%']);
			// $queryAvg->where(['id' => $this->request->getData('videoId')]);
			// $queryAvg->where(['user_id' => $this->request->getData('uploader')]);
			// $queryAvg->where(['description' => '%' . $this->request->getData('kyeWord') . '%']);

			$this->set('results', $queryMov->toArray());
		}

    }
}
