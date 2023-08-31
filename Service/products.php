<?php
namespace App\Service;
use App\Models\Product;
use Illuminate\Pagination\Pagination;


class products
{
     public static function get_all_product()
    {
        $products = Product::all()->paginate(3);
       return $products;
    }
    public static function searchByName($request)
    {
        try {
            $searchTerm = $request->input('searchTerm');
            $minPrice = $request->input('minPrice');
            $maxPrice = $request->input('maxPrice');
            $brand = $request->input('brand');
            $category = $request->input('category');

            $query = Product::query();

            if ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            }

            if ($minPrice) {
                $query->where('price', '>=', $minPrice);
            }

            if ($maxPrice) {
                $query->where('price', '<=', $maxPrice);
            }

            if ($brand) {
                $query->where('brand', 'like', '%' . $brand . '%');
            }

            if ($category) {
                $query->where('category', 'like', '%' . $category . '%');
            }

            $products = $query->get();
            return  $products ;
        } catch (\Exception $e) {
            // يمكنك إجراء ما تراه مناسباً هنا في حالة حدوث خطأ
            return response()->json(['error' => 'حدث خطأ أثناء البحث عن المنتجات.']);
        }
    }
        
    


}