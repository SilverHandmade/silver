<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequestMessages Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\RequestMessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequestMessage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequestMessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequestMessage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequestMessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequestMessage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequestMessage findOrCreate($search, callable $callback = null, $options = [])
 */
class RequestMessagesTable extends Table
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

        $this->setTable('request_messages');
        $this->setDisplayField('id');
        $this->setPrimaryKey(['id', 'ren']);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('ren')
            ->allowEmpty('ren', 'create');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        $validator
            ->dateTime('transmit')
            ->requirePresence('transmit', 'create')
            ->notEmpty('transmit');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
