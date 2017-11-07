<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequestDetailses Model
 *
 * @property \App\Model\Table\RequestsTable|\Cake\ORM\Association\BelongsTo $Requests
 *
 * @method \App\Model\Entity\RequestDetailse get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequestDetailse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequestDetailse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequestDetailse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequestDetailse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequestDetailse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequestDetailse findOrCreate($search, callable $callback = null, $options = [])
 */
class RequestDetailsesTable extends Table
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

        $this->setTable('request_detailses');
        $this->setDisplayField('request_id');
        $this->setPrimaryKey(['request_id', 'ren']);

        $this->belongsTo('Requests', [
            'foreignKey' => 'request_id',
            'joinType' => 'INNER'
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['request_id'], 'Requests'));

        return $rules;
    }
}
