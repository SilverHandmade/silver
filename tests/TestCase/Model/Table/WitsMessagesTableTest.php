<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WitsMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WitsMessagesTable Test Case
 */
class WitsMessagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WitsMessagesTable
     */
    public $WitsMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wits_messages',
        'app.wits',
<<<<<<< HEAD
        'app.users',
        'app.facilities',
        'app.facility_classes',
        'app.movies',
        'app.products',
        'app.requests',
        'app.f_motos',
        'app.f_sakis',
        'app.request_detailses',
        'app.witses'
=======
        'app.users'
>>>>>>> 66aa313173741bc6d78f077ce791c09e8865993c
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WitsMessages') ? [] : ['className' => WitsMessagesTable::class];
        $this->WitsMessages = TableRegistry::get('WitsMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WitsMessages);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
