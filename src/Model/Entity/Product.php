<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $midasi_url
 * @property \Cake\I18n\FrozenTime $Postdate
 * @property int $user_id
 * @property int $access
 * @property int $Del_flg
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ProductDetailse[] $product_detailses
 * @property \App\Model\Entity\Request[] $requests
 */
class Product extends Entity
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
