<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

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
