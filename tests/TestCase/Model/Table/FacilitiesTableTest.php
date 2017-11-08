<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacilitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacilitiesTable Test Case
 */
class FacilitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FacilitiesTable
     */
    public $Facilities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.facilities',
<<<<<<< HEAD
<<<<<<< HEAD
        'app.facility_classes'
=======
        'app.facility_classes',
        'app.movies',
        'app.products',
        'app.witses'
>>>>>>> 66aa313173741bc6d78f077ce791c09e8865993c
=======
        'app.facility_classes'
>>>>>>> e6ceb1048a14179e0721f35b51291fa36f3df79d
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Facilities') ? [] : ['className' => FacilitiesTable::class];
        $this->Facilities = TableRegistry::get('Facilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Facilities);

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
