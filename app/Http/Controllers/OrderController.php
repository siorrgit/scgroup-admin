<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shop;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function incompletes()
    {
        $orders = Order::query()
                       ->whereIn('status', ['incomplete', 'notified'])
                       ->get();
        $shops = Shop::all();

        return view('order.index', [
            'orders' => $orders,
            'shops' => $shops,
        ]);
    }

    public function completes()
    {
        $orders = Order::query()
                       ->whereIn('status', ['apppayed', 'shoppayed', 'canceled'])
                       ->get();
        $shops = Shop::all();

        return view('order.index', [
            'orders' => $orders,
            'shops' => $shops,
        ]);
    }

    public function edit(string $id)
    {
        $order = Order::find($id);

        return view('order.detail', [
            'order' => $order,
        ]);
    }

    public function notify(string $id)
    {
        $order = Order::find($id);
        $order->status = 'incomplete_notified';

        return redirect("/incomplete/{$id}")->with(['status' => 'order-notified']);
    }
}
