<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChangeMail Entity
 *
 * @property int $user_id
 * @property int $change_id
 * @property string $m_mail
 * @property string $c_mail
 * @property int $kan_flg
 * @property \Cake\I18n\FrozenTime $change_time
 * @property string $uuid
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Change $change
 */
class ChangeMail extends Entity
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
        'user_id' => false,
        'change_id' => false
    ];
}
