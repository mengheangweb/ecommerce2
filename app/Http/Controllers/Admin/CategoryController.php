<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request){
        $keyword = $request->search;

        $query = Category::where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'desc');
        $categories = $query->paginate(5);

        return view('admin.pages.category.index', compact('categories'));
    }
}
