<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoviesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoviesTable Test Case
 */
class MoviesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MoviesTable
     */
    public $Movies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.movies',
<<<<<<< HEAD
        'app.users',
        'app.facilities',
        'app.facility_classes',
        'app.products',
        'app.requests',
        'app.f_motos',
        'app.f_sakis',
        'app.request_detailses',
        'app.wits_messages',
        'app.wits',
        'app.witses'
=======
        'app.facilities',
        'app.facility_classes'
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
        $config = TableRegistry::exists('Movies') ? [] : ['className' => MoviesTable::class];
        $this->Movies = TableRegistry::get('Movies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Movies);

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
