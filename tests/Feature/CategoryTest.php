<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Category;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A test Create and read the category
     *
     * @return void
     */
    public function testGetCategory()
    {
        //Given we have categiry in the database
        $category = factory('App\Category')->create();
 
        //When user visit the category page
        $response = $this->get('/Category'); // your route to get category
 
        //He should be able to read the category
        $response->assertSee($category->name);
    }
    
    /**
     * A test Create and read the category
     *
     * @return void
     */
    public function testCreateCategory()
    {
        //Given we have category in the database
        $category = factory('App\Category')->make();
 
         //When user submits category request to create endpoint
        $this->post('/Category.store',$category->toArray()); // your route to create category
    
        //It gets stored in the database
        $this->assertEquals(1,Category::all()->count());
    }

}
