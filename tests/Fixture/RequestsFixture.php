<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequestsFixture
 *
 */
class RequestsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 9, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '依頼ID', 'precision' => null, 'autoIncrement' => null],
        'F_moto_id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '依頼元施設ID', 'precision' => null, 'autoIncrement' => null],
        'F_saki_id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '依頼先施設ID', 'precision' => null, 'autoIncrement' => null],
        'product_id' => ['type' => 'integer', 'length' => 8, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '制作物ID', 'precision' => null, 'autoIncrement' => null],
        'title' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'タイトル', 'precision' => null],
        'From_date' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '依頼日', 'precision' => null],
        'To_date' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '締切日', 'precision' => null],
        'su' => ['type' => 'integer', 'length' => 3, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '個数', 'precision' => null, 'autoIncrement' => null],
        'ju_flg' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '受注フラグ', 'precision' => null, 'autoIncrement' => null],
        'kan_flg' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '完了フラグ', 'precision' => null, 'autoIncrement' => null],
        'Del_flg' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '削除フラグ', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'F_moto_id' => 1,
            'F_saki_id' => 1,
            'product_id' => 1,
            'title' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
<<<<<<< HEAD
<<<<<<< HEAD
            'From_date' => '2017-11-06 06:16:49',
            'To_date' => '2017-11-06 06:16:49',
=======
            'From_date' => '2017-11-07 00:33:41',
            'To_date' => '2017-11-07 00:33:41',
>>>>>>> 66aa313173741bc6d78f077ce791c09e8865993c
=======
            'From_date' => '2017-11-08 02:40:50',
            'To_date' => '2017-11-08 02:40:50',
>>>>>>> e6ceb1048a14179e0721f35b51291fa36f3df79d
            'su' => 1,
            'ju_flg' => 1,
            'kan_flg' => 1,
            'Del_flg' => 1
        ],
    ];
}
