<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WitsMessage Entity
 *
 * @property int $wits_id
 * @property int $ren
 * @property string $message
 * @property \Cake\I18n\FrozenTime $transmit
 * @property int $user_id
 * @property int $Del_flg
 *
 * @property \App\Model\Entity\Wit $wit
 * @property \App\Model\Entity\User $user
 */
class WitsMessage extends Entity
{

}
