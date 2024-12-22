<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shop;
use App\Models\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query()
            ->whereIn('status', ['incomplete_notified', 'complete_apppayed', 'complete_shoppayed', 'complete_canceled'])
            ->get();

        foreach ($orders as $order) {
            $order->started_at = new Carbon();
            $order->save();
        }

        return view('developer', compact('orders'));
    }
}
