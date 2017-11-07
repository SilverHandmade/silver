<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WitsMessages Model
 *
 * @property \App\Model\Table\WitsTable|\Cake\ORM\Association\BelongsTo $Wits
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\WitsMessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\WitsMessage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WitsMessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WitsMessage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WitsMessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WitsMessage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WitsMessage findOrCreate($search, callable $callback = null, $options = [])
 */
class WitsMessagesTable extends Table
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

        $this->setTable('wits_messages');

        $this->belongsTo('Wits', [
            'foreignKey' => 'wits_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('ren')
            ->requirePresence('ren', 'create')
            ->notEmpty('ren');

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
        $rules->add($rules->existsIn(['wits_id'], 'Wits'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
