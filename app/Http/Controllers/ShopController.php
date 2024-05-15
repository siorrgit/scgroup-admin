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
        $areas = Area::all();
        $shop = Shop::find($id);

        return view('shop/detail', [
            'areas' => $areas,
            'shop' => $shop,
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
        $areas = Area::all();

        $request->validate([
            'id' => 'required|alpha_num:ascii|unique:shops|max:32',
        ]);

        $shop = Shop::create([
            'id' => $request->id,
            'area_id' => (int) $request->area_id,
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

        return redirect('/shop/' . $shop->id);
    }

    public function update(Request $request, string $id)
    {
        $shop = Shop::find($id);
        $shop->area_id = (int) $request->area_id;
        $shop->name = $request->name;
        $shop->postcode = $request->postcode;
        $shop->address = $request->address;
        $shop->lat = $request->lat;
        $shop->lng = $request->lng;
        $shop->tel = $request->tel;
        $shop->hours = $request->hours;
        $shop->holiday = $request->holiday;
        $shop->note = $request->note;
        $shop->payable = $request->payable;
        if ($request->password) {
            $shop->password = Hash::make($request->password);
        }
        $shop->save();

        return redirect('/shop/' . $shop->id);
    }

    public function destroy(Request $request, string $id)
    {
        $shop = Shop::find($id);
        $shop->is_active = false;
        $shop->save();

        return redirect('/shop/' . $shop->id)->with(['status' => 'shop-deleted']);
    }

    public function activate(Request $request, string $id)
    {
        $shop = Shop::find($id);
        $shop->is_active = true;
        $shop->save();

        return redirect('/shop/' . $shop->id)->with(['status' => 'shop-activated']);
    }
}
