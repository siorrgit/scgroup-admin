<?php

namespace App\Http\Controllers;

// use App\Http\Resources\OrderResource;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();

        return view('shop/index', [
            'shops' => $shops
        ]);
    }

    public function show(string $id)
    {
        $shop = Shop::find($id);

        return view('shop/detail', [
            'shop' => $shop
        ]);
    }

    public function post()
    {

        return view('shop/add', [
        ]);
    }
}
