<?php

namespace App\Http\Controllers;

// use App\Http\Resources\OrderResource;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // $orders = Order::all();
        $shops = Shop::all();

        return view('shop', [
            'shops' => $shops
        ]);
    }
}
