<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UniqueIdsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UniqueIdsTable Test Case
 */
class UniqueIdsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UniqueIdsTable
     */
    public $UniqueIds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.unique_ids',
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
        'app.request_messages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UniqueIds') ? [] : ['className' => UniqueIdsTable::class];
        $this->UniqueIds = TableRegistry::get('UniqueIds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UniqueIds);

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
