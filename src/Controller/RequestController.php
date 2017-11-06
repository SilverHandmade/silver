<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
class RequestController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }
    public function index()
    {
      {

        // Table
        $facilities = TableRegistry::get('facilities'); // 呼び出したいテーブル名を指定
        $query = $facilities->find(); // 検索クエリです。
        foreach($query as $row){
          $facility .= $row['name']; // データをまとめて
        }
        $this->set('facility',$facility); // ここでセットしてテンプレートViewに渡します
      }
    }
}
