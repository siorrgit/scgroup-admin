<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function incompletes()
    {
        $orders = Order::query()
                       ->whereIn('status', ['incomplete', 'notified'])
                       ->get();

        return view('order.index', [
            'orders' => $orders,
        ]);
    }

    public function completes()
    {
        $orders = Order::query()
                       ->whereIn('status', ['apppayed', 'shoppayed', 'canceled'])
                       ->get();

        return view('order.index', [
            'orders' => $orders,
        ]);
    }

    public function edit(string $id)
    {
        $order = Order::find($id);

        return view('order.detail', [
            'order' => $order,
        ]);
    }
}
