<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequestMessage Entity
 *
 * @property int $id
 * @property int $ren
 * @property string $message
 * @property \Cake\I18n\FrozenTime $transmit
 * @property int $Del_flg
 */
class RequestMessage extends Entity
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
        'id' => false,
        'ren' => false
    ];
}
