<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequestMessagesFixture
 *
 */
class RequestMessagesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'request_id' => ['type' => 'integer', 'length' => 9, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '依頼ID', 'precision' => null, 'autoIncrement' => null],
        'ren' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '連番', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '送信者ID', 'precision' => null, 'autoIncrement' => null],
        'message' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'メッセージ', 'precision' => null],
        'transmit' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '送信日', 'precision' => null],
        'Del_flg' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '削除フラグ', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['request_id', 'ren'], 'length' => []],
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
            'request_id' => 1,
            'ren' => 1,
            'user_id' => 1,
            'message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'transmit' => '2017-11-08 02:40:48',
            'Del_flg' => 1
        ],
    ];
}
