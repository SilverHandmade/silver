<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property int $facilities_id
 * @property int $facility_classes_id
 * @property string $hurigana
 * @property string $password
 * @property int $Del_flg
 *
 * @property \App\Model\Entity\Facility $facility
 * @property \App\Model\Entity\FacilityClass $facility_class
 * @property \App\Model\Entity\Movie[] $movies
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\RequestMessage[] $request_messages
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
