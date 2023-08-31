<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\ProductFactory;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_product_list_page_loads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_get_products()
    {
      
        Product::factory()->count(5)->create();

      
        $products = Product::getProducts();

       
        $this->assertCount(5, $products);
    }
}
