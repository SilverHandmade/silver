<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
class FacilityTable extends Table {


$articles = TableRegistry::get('facilities');

$query = $articles->find();

foreach ($query as $row) {
    echo $row->name;
}
}
