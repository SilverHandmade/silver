<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\FacilitiesTable|\Cake\ORM\Association\BelongsTo $Facilities
 * @property \App\Model\Table\FacilityClassesTable|\Cake\ORM\Association\BelongsTo $FacilityClasses
 * @property |\Cake\ORM\Association\HasMany $Movies
 * @property |\Cake\ORM\Association\HasMany $Products
 * @property |\Cake\ORM\Association\HasMany $RequestMessages
 * @property \App\Model\Table\WitsMessagesTable|\Cake\ORM\Association\HasMany $WitsMessages
 * @property |\Cake\ORM\Association\HasMany $Witses
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Facilities', [
            'foreignKey' => 'facilities_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FacilityClasses', [
            'foreignKey' => 'facility_classes_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Movies', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('RequestMessages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('WitsMessages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Witses', [
            'foreignKey' => 'user_id'
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('hurigana')
            ->requirePresence('hurigana', 'create')
            ->notEmpty('hurigana');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['facilities_id'], 'Facilities'));
        $rules->add($rules->existsIn(['facility_classes_id'], 'FacilityClasses'));

        return $rules;
    }
}
