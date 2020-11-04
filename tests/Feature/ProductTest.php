<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Product;

class ProductTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A test Create and read the product
     *
     * @return void
     */
    public function testGetProduct()
    {
        //Given we have product in the database
        $product = factory('App\Product')->create();
 
        //When user visit the product page
        $response = $this->get('/Product'); // your route to get product
 
        //He should be able to read the product
        $response->assertSee($product->name);
    }
    
    /**
     * A test Create and read the product
     *
     * @return void
     */
    public function testCreateProduct()
    {
        //Given we have product in the database
        $product = factory('App\Product')->make();

        //When user submits product request to create endpoint
        $this->post('/Product.store',$product->toArray()); // your route to create product
    
        //It gets stored in the database
        $this->assertEquals(1,Product::all()->count());
    }

}
