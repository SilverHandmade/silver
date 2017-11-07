<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductDetailses Model
 *
 * @method \App\Model\Entity\ProductDetailse get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductDetailse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductDetailse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductDetailse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductDetailse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductDetailse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductDetailse findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductDetailsesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('product_detailses');
        $this->setDisplayField('id');
        $this->setPrimaryKey(['id', 'ren']);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('ren')
            ->allowEmpty('ren', 'create');

        $validator
            ->scalar('explain')
            ->allowEmpty('explain');

        $validator
            ->scalar('photo_url')
            ->allowEmpty('photo_url');

        return $validator;
    }
}
