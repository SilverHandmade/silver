<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Mailer\Email;

class EmailController extends AppController
{
    public function initialize()
    {
        parent::initialize();
		
    }
    public function index() {
		$email = new Email('default');
		$email->from(['Taguchi.SilverHandmade@gmail.com' => 'OIC'])
			->to('nagiyan15@gmail.com')
			->subject('About')
			->send('My message');
    }
}
