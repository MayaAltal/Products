<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;

class ProductSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_by_name()
    {
        // قم بإضافة البيانات المؤقتة مباشرة في قاعدة البيانات
        Product::create(['name' => 'Product One', 'price' => 100]);
        Product::create(['name' => 'Product Two', 'price' => 150]);

        // قم بإرسال طلب GET للاختبار
        $response = $this->getJson('/search', [
            'name' => 'Product One',
            'price' => null,
            'price' => 100,
            'brand' => null,
            'category' => null,
            'image'=>null
        ]);

        // التأكد من أن الاستجابة ناجحة
        $response->assertStatus(200);

    
        $response->assertJsonFragment(['name' => 'Product One']);
    }
}
