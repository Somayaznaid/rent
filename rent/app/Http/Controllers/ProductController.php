<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {


        $category = $request->input('category_id ');
        $type = $request->input('status');
        $startPrice = Product::min('product_price');
        $endPrice = Product::max('product_price');

        $query = Product::query();

        if ($category) {
            $query->where('category_id ', $category);
        }

        if ($type) {
            $query->where('status', $type);
        }

        if ($startPrice && $endPrice) {
            $query->whereBetween('product_price', [$startPrice, $endPrice]);
        }

        $products = $query->get();

        return view('vehicle', compact('products'));
    }
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found'); // Handle the case when the product is not found
        }

        return view('singleproduct', ['product' => $product]);
    }



}