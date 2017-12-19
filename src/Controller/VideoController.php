<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\I18n\Time;

class VideoController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$session = $this->request->session();
		if (empty($session->read('Auth'))) {
			$this->redirect(['controller' => 'login', 'action' => 'index', 'ref' => $this->name]);
		}
		$this->loadmodel('Movies');
	}
	public function index()
	{
		$queryMov = $this->Movies->find();
		if ($this->request->is('ajax')) {
			// $queryMov->contain();
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
			if (!empty($this->request->getData('term'))) {
				$now = Time::now();
				$args = Time::now();;
				$args->subDays($this->request->getData('term'));
				$queryMov
					->where(function ($exp, $q) use ($args, $now) {
						return $exp->between('contribution', $args, $now);
					});
			}
			$this->set('results', $queryMov->toArray());
        	$this->render("/Element/videoSerchResult");
		} else {
			$this->set('results', $queryMov->limit(20)->toArray());
		}
	}

	public function view()
	{
		$geVideo = $this->Movies->get($this->request->getParam('id'));
		$this->set('video', $geVideo->toArray());
	}
	public function upload()
	{

	}
}
