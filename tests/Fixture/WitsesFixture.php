<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WitsesFixture
 *
 */
class WitsesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '知恵ID', 'precision' => null, 'autoIncrement' => null],
        'title' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'タイトル', 'precision' => null, 'fixed' => null],
        'content' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'お悩み内容', 'precision' => null],
<<<<<<< HEAD
        'facility_id' => ['type' => 'integer', 'length' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '投稿者', 'precision' => null, 'autoIncrement' => null],
=======
        'user_id' => ['type' => 'integer', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '投稿者', 'precision' => null, 'autoIncrement' => null],
>>>>>>> 66aa313173741bc6d78f077ce791c09e8865993c
        'Postdate' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '投稿日', 'precision' => null],
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
            'title' => 'Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
<<<<<<< HEAD
            'facility_id' => 1,
            'Postdate' => '2017-11-06 06:16:52',
=======
            'user_id' => 1,
<<<<<<< HEAD
            'Postdate' => '2017-11-07 01:13:10',
>>>>>>> 66aa313173741bc6d78f077ce791c09e8865993c
=======
            'Postdate' => '2017-11-08 02:40:54',
>>>>>>> e6ceb1048a14179e0721f35b51291fa36f3df79d
            'kan_flg' => 1,
            'Del_flg' => 1
        ],
    ];
}