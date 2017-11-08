<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestDetailsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestDetailsesTable Test Case
 */
class RequestDetailsesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestDetailsesTable
     */
    public $RequestDetailses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.request_detailses',
<<<<<<< HEAD
        'app.requests',
        'app.f_motos',
        'app.f_sakis',
        'app.products',
        'app.users',
        'app.facilities',
        'app.facility_classes',
        'app.movies',
        'app.wits_messages',
        'app.wits',
        'app.witses'
=======
        'app.requests'
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
        $config = TableRegistry::exists('RequestDetailses') ? [] : ['className' => RequestDetailsesTable::class];
        $this->RequestDetailses = TableRegistry::get('RequestDetailses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequestDetailses);

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
