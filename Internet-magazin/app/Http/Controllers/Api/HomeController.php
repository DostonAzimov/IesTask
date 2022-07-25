<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function products()
    {
        $products = Product::paginate(10);
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'All Products',
            'products' => $products
        ], $code);
    }

    public function OnSale()
    {
        $product = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(12);
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'Sale Products',
            'SaleProduct' => $product
        ], $code);
    }

    public function latestProduct()
    {
        $product = Product::orderBy('created_at', 'DESC')->get()->take(10);
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'Latest Products',
            'SaleProduct' => $product
        ], $code);
    }

    public function categories()
    {
        $categories = Category::all();
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'Categories',
            'SaleProduct' => $categories
        ], $code);
    }

    public function search(Request $request)
    {
        $search = '%' . $request->name . '%';
        $product = Product::where('name', 'LIKE', $search)->get();
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'Search Products',
            'Search Product' => $product
        ], $code);
    }





}
