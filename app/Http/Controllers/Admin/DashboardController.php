<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function countProduct()
    {
        $count = Product::count();

        return response()->json(['products' => $count]);
    }
}
