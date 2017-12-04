<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WitsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WitsesTable Test Case
 */
class WitsesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WitsesTable
     */
    public $Witses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.witses',
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
        $config = TableRegistry::exists('Witses') ? [] : ['className' => WitsesTable::class];
        $this->Witses = TableRegistry::get('Witses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Witses);

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
