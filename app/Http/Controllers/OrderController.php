<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\Receipt;

class OrderController extends Controller
{
    public function order()
    {
        // validate stock.

        // start create order

        // substruct stock

        // send receipt

        Receipt::dispatch();

        return redirect()->back()->with('message','You have successfully placed an order.');
    }
}
