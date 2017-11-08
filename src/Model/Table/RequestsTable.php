<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requests Model
 *
 * @property \App\Model\Table\FMotosTable|\Cake\ORM\Association\BelongsTo $FMotos
 * @property \App\Model\Table\FSakisTable|\Cake\ORM\Association\BelongsTo $FSakis
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\RequestDetailsesTable|\Cake\ORM\Association\HasMany $RequestDetailses
 * @property |\Cake\ORM\Association\HasMany $RequestMessages
 *
 * @method \App\Model\Entity\Request get($primaryKey, $options = [])
 * @method \App\Model\Entity\Request newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Request[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Request|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Request patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Request[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Request findOrCreate($search, callable $callback = null, $options = [])
 */
class RequestsTable extends Table
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

        $this->setTable('requests');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('FMotos', [
            'foreignKey' => 'F_moto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FSakis', [
            'foreignKey' => 'F_saki_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('RequestDetailses', [
            'foreignKey' => 'request_id'
        ]);
        $this->hasMany('RequestMessages', [
            'foreignKey' => 'request_id'
        ]);
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
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->dateTime('From_date')
            ->requirePresence('From_date', 'create')
            ->notEmpty('From_date');

        $validator
            ->dateTime('To_date')
            ->requirePresence('To_date', 'create')
            ->notEmpty('To_date');

        $validator
            ->integer('su')
            ->requirePresence('su', 'create')
            ->notEmpty('su');

        $validator
            ->integer('ju_flg')
            ->allowEmpty('ju_flg');

        $validator
            ->integer('kan_flg')
            ->requirePresence('kan_flg', 'create')
            ->notEmpty('kan_flg');

        $validator
            ->integer('Del_flg')
            ->requirePresence('Del_flg', 'create')
            ->notEmpty('Del_flg');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['F_moto_id'], 'FMotos'));
        $rules->add($rules->existsIn(['F_saki_id'], 'FSakis'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
