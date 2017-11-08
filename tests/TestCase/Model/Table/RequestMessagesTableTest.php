<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestMessagesTable Test Case
 */
class RequestMessagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestMessagesTable
     */
    public $RequestMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.request_messages',
        'app.requests',
        'app.f_motos',
        'app.f_sakis',
        'app.products',
        'app.users',
        'app.facilities',
        'app.facility_classes',
        'app.wits_messages',
        'app.wits',
        'app.request_detailses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequestMessages') ? [] : ['className' => RequestMessagesTable::class];
        $this->RequestMessages = TableRegistry::get('RequestMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequestMessages);

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
