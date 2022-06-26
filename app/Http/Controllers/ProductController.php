<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request) {

        $query = Product::query()->orderBy('id', 'desc');

        if($request->has('c')){
            $query->where('category_id', $request->c);
        }

        $products = $query->paginate(10);

        $categories = Category::all();

        return view('pages.product.listing', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function show(){
        $product = Product::where('id', request('id'))->first();

        return view('pages.product.detail', compact('product'));
    }
}
