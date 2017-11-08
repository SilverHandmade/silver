<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequestDetailse Entity
 *
 * @property int $request_id
 * @property int $ren
 * @property string $explain
 * @property string $photo_url
 *
 * @property \App\Model\Entity\Request $request
 */
class RequestDetailse extends Entity
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
        'request_id' => false,
        'ren' => false
    ];
}
