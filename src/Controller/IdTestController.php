<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

class IdTestController extends AppController
{

    public function initialize()
	{
        parent::initialize();
		//$this->loadComponent('MakeId9');
    }


    public function index() {
		//$a=$this->MakeId9->id9('req');
		//$this->set("a", $a);
		$ym = $this->ymdate();//yymm取得
      	$this->set("ymd", $ym);
      	//連番生成↓
      	$SeiHy = $this->Sei($ym);
      	//$SeiHy = round($SeiHy/10000,0);
      	if(round($SeiHy/10000,0) == $ym){
        $SayHy = $SeiHy +1;
    	}

      	$this->set("SeiWt", $SeiHy);
      	//$SayHy = $this->Say($ym);
      	$this->set("SayWt", $SayHy);

      	return;
    }

    public function ymdate()
    {
      	date_default_timezone_set('UTC');
      	$dt = date("ym");//yymm生成 掛けて比較して同じなら+1　違えば01
      	return $dt;
    }
    public function Sei()
    {
      	$requests = TableRegistry::get('requests');

      	// 新しいクエリーを始めます。
      	$query = $requests->find();
      	$ret = $query->select(['max_id' => $query->func()->max('1')])->first();
      	$id = $ret->max_id;
      	return $id;
    }

    public function Say(int $nt)
    {
      	$requests = TableRegistry::get('requests');
      	$query = $requests->find();
      	$ret = $query->select(['id'])
                        ->first();
                          //debug($query);
      	$id = $ret->id;
      	echo $query;
      	return $id ;
    }
}
