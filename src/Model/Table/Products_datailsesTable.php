<?php
namespace App\Model\Table;
use Cake\ORM\Table;
class ProductsTable extends Table {
	public function initialize(array $config)
	{
			parent::initialize($config);

			$this->setTable('products');
			$this->setDisplayField('id');
			$this->setPrimaryKey('id');

			$this->addBehavior('Timestamp');
	}
}
