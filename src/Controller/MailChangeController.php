<?php
namespace App\Controller;

use App\Controller\AppController;

class MailchangeController extends AppController
{
	public function index()
	    {
			if ($this->request->is('post')) {
				$session = $this->request->session();
				$Uid = $session->read('id');
			}
	    }
}
