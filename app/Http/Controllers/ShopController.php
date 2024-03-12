<?php

namespace App\Http\Controllers;

// use App\Http\Resources\OrderResource;
use App\Models\Area;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function create(): View
    {
        $areas = Area::all();

        return view('shop/detail', [
            'areas' => $areas
        ]);
    }

    public function store(Request $request): View
    {
        $request->validate([
            'id' => 'required|alpha_num:ascii|unique:shops|max:32',
        ]);

        $shop = Shop::create([
            'id' => $request->id,
            'area_id' => $request->area_id,
            'name' => $request->name,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'tel' => $request->tel,
            'hours' => $request->hours,
            'holiday' => $request->holiday,
            'note' => $request->note,
            'payable' => $request->payable,
            'email' => $request->id . '@shohousen.com',
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
        ]);

        return view('shop/detail', [
            'shop' => $shop
        ]);
    }
}
