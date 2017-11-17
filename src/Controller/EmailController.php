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
		$email = new Email('default');
		$email->from(['me@example.com' => 'My Site'])
		    ->to('oic.t.ueda@gmail.com')
		    ->subject('About')
		    ->send('My message');
    }


    public function default() {

    }
}
