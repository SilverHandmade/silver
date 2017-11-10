<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacilityClassesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacilityClassesTable Test Case
 */
class FacilityClassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FacilityClassesTable
     */
    public $FacilityClasses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.facility_classes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FacilityClasses') ? [] : ['className' => FacilityClassesTable::class];
        $this->FacilityClasses = TableRegistry::get('FacilityClasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FacilityClasses);

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
}
