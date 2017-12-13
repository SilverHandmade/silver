<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChangeMails Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ChangesTable|\Cake\ORM\Association\BelongsTo $Changes
 *
 * @method \App\Model\Entity\ChangeMail get($primaryKey, $options = [])
 * @method \App\Model\Entity\ChangeMail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ChangeMail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ChangeMail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChangeMail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ChangeMail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ChangeMail findOrCreate($search, callable $callback = null, $options = [])
 */
class ChangeMailsTable extends Table
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

        $this->setTable('change_mails');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey(['user_id', 'change_id']);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Changes', [
            'foreignKey' => 'change_id',
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
            ->scalar('m_mail')
            ->requirePresence('m_mail', 'create')
            ->notEmpty('m_mail');

        $validator
            ->scalar('c_mail')
            ->requirePresence('c_mail', 'create')
            ->notEmpty('c_mail');

        $validator
            ->integer('kan_flg')
            ->requirePresence('kan_flg', 'create')
            ->notEmpty('kan_flg');

        $validator
            ->dateTime('change_time')
            ->requirePresence('change_time', 'create')
            ->notEmpty('change_time');

        $validator
            ->scalar('uuid')
            ->allowEmpty('uuid');

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
        $rules->add($rules->existsIn(['change_id'], 'Changes'));

        return $rules;
    }
}
