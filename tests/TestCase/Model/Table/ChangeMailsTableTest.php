<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChangeMailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChangeMailsTable Test Case
 */
class ChangeMailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChangeMailsTable
     */
    public $ChangeMails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.change_mails',
        'app.users',
        'app.facilities',
        'app.facility_classes',
        'app.movies',
        'app.products',
        'app.product_detailses',
        'app.requests',
        'app.f_motos',
        'app.f_sakis',
        'app.request_detailses',
        'app.request_messages',
        'app.changes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ChangeMails') ? [] : ['className' => ChangeMailsTable::class];
        $this->ChangeMails = TableRegistry::get('ChangeMails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChangeMails);

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
