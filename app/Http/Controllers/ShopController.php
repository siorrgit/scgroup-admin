<?php

namespace App\Http\Controllers;

// use App\Http\Resources\OrderResource;
use App\Models\Area;
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
        $areas = Area::all();

        return view('shop/detail', [
            'shop' => $shop,
            'areas' => $areas,
        ]);
    }

    public function create()
    {
        $areas = Area::all();

        return view('shop/detail', [
            'areas' => $areas
        ]);
    }

    public function store(Request $request)
    {
        $shop = Shop::create($request->all());

        return view('shop/detail', [
            'shop' => $shop
        ]);
    }
}
