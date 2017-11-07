<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Facilities Model
 *
 * @property \App\Model\Table\FacilityClassesTable|\Cake\ORM\Association\BelongsTo $FacilityClasses
 * @property \App\Model\Table\MoviesTable|\Cake\ORM\Association\HasMany $Movies
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\WitsesTable|\Cake\ORM\Association\HasMany $Witses
 *
 * @method \App\Model\Entity\Facility get($primaryKey, $options = [])
 * @method \App\Model\Entity\Facility newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Facility[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Facility|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Facility patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Facility[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Facility findOrCreate($search, callable $callback = null, $options = [])
 */
class FacilitiesTable extends Table
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

        $this->setTable('facilities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('FacilityClasses', [
            'foreignKey' => 'facility_classes_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Movies', [
            'foreignKey' => 'facility_id'
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'facility_id'
        ]);
        $this->hasMany('Witses', [
            'foreignKey' => 'facility_id'
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('Post')
            ->requirePresence('Post', 'create')
            ->notEmpty('Post');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmpty('address');

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
        $rules->add($rules->existsIn(['facility_classes_id'], 'FacilityClasses'));

        return $rules;
    }
}
