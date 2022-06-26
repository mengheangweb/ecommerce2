<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;

class ProductController extends Controller
{
    public function index(Request $request) {

        $keyword = $request->search;

        $query = Product::where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'desc');
        $products = $query->paginate(5);

        $soft_deletes = Product::onlyTrashed()->get();

        return view('admin.pages.product.index', compact('products', 'soft_deletes'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.pages.product.create', compact('categories', 'tags'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|min:3',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

       $product = Product::create([
           'name' => $request->name,
           'category_id' => $request->category,
           'image' => $request->image->hashName(),
           'price' => $request->price,
           'description' => $request->description
       ]);

       $tags = $request->tag;

       $product->tag()->attach($tags);

       if($request->hasFile('image')){
           $request->image->store('public/products', );
       }

        return redirect()->route('list-product');
    }

    public function destroy($id){
        $product = Product::find($id);

        if($product){
            $product->delete();
        }

        return redirect()->back();
    }

    public function restore($id) {
        $product = Product::withTrashed()->whereId($id)->first();

        if($product){
            $product->restore();
        }

        return redirect()->back();
    }
}
