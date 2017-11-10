<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductDetailsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductDetailsesTable Test Case
 */
class ProductDetailsesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductDetailsesTable
     */
    public $ProductDetailses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_detailses',
        'app.products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductDetailses') ? [] : ['className' => ProductDetailsesTable::class];
        $this->ProductDetailses = TableRegistry::get('ProductDetailses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductDetailses);

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
