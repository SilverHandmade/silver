<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestsTable Test Case
 */
class RequestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestsTable
     */
    public $Requests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requests',
        'app.f_motos',
        'app.f_sakis',
        'app.products',
        'app.users',
        'app.facilities',
        'app.facility_classes',
        'app.movies',
        'app.facilities',
        'app.facility_classes',
        'app.movies',
        'app.witses',
=======
        'app.users',
        'app.facilities',
        'app.facility_classes',
        'app.wits_messages',
        'app.wits',
>>>>>>> 74bd0a728d4dacc0031ac720b3b9cf46448a9231
=======
        'app.request_messages',
        'app.product_detailses',
>>>>>>> 01338f7df9c099a63e581f9e33d1ba3bcbd5fb44
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
        $config = TableRegistry::exists('Requests') ? [] : ['className' => RequestsTable::class];
        $this->Requests = TableRegistry::get('Requests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Requests);

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
