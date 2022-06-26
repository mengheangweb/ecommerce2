<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\App;

use App\Mail\OrderReceipt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index(){

        $products = Product::orderBy('id', 'desc')->get();

        // \Mail::to('mengheangweb@gmail.com')->send(new OrderReceipt());

        return view('pages.home', compact('products') );
    }
}
