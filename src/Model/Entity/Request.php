<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property int $F_moto_id
 * @property int $F_saki_id
 * @property int $product_id
 * @property string $title
 * @property \Cake\I18n\FrozenTime $From_date
 * @property \Cake\I18n\FrozenTime $To_date
 * @property int $su
 * @property int $ju_flg
 * @property int $kan_flg
 * @property int $Del_flg
 *
 * @property \App\Model\Entity\FMoto $f_moto
 * @property \App\Model\Entity\FSaki $f_saki
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\RequestDetailse[] $request_detailses
 * @property \App\Model\Entity\RequestMessage[] $request_messages
 */
class Request extends Entity
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
}
