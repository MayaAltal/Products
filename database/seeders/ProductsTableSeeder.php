<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $products = [
            [
                'name' => 'منتج 1',
                'description' => 'وصف المنتج 1',
                'image' => 'Screenshot (15).png',
                'price' => '  10000',
                'brand' => '  kia rio',
                'category' => 'car',
            ],
            [
                'name' => 'منتج 2',
                'description' => 'وصف المنتج 2',
                'image' => 'Screenshot (15).png',
                'price' => '  10000',
                'category' => 'car',
                'brand' => '  kia rio',
            ],
            // ... إضافة المزيد من المنتجات هنا
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
    
}
