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

    public function edit(string $id)
    {
        $shop = Shop::find($id);

        return view('shop/detail', [
            'shop' => $shop
        ]);
    }

    public function create()
    {
        return view('shop/detail');
    }

    public function store(Request $request)
    {
        $shop = Shop::create($request->all());

        return view('shop/detail', [
            'shop' => $shop
        ]);
    }
}
