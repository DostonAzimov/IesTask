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

    public function add_to_cart(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $product = Product::find($id);
        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->product_id = $id;
        $cart->category_id = $product->category_id;
        $cart->quantity = $request->quantity;
        $cart->price = $request->quantity * $product->price;
        $cart->save();
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully save to cart!',
            'Cart' => $cart
        ], $code);
    }

    public function allCart()
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->get();
        $code = 200;
        return response()->json([
            'status' => 'Success',
            'message' => 'All your cart!',
            'All cart' => $cart
        ], $code);
    }




}
