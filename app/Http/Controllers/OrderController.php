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
                       ->whereIn('status', ['incomplete_sent', 'incomplete_notified'])
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
                       ->whereIn('status', ['complete_apppayed', 'complete_shoppayed', 'complete_canceled'])
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
        $order->save();

        return redirect("/order/{$id}")->with(['status' => 'order-notified']);
    }

    public function apppay(string $id)
    {
        $order = Order::find($id);
        $order->status = 'complete_apppayed';
        $order->save();

        return redirect("/order/{$id}")->with(['status' => 'order-apppayed']);
    }

    public function shoppay(string $id)
    {
        $order = Order::find($id);
        $order->status = 'complete_shoppayed';
        $order->save();

        return redirect("/order/{$id}")->with(['status' => 'order-shoppayed']);
    }

    public function cancel(string $id)
    {
        $order = Order::find($id);
        $order->status = 'complete_canceled';
        $order->save();

        return redirect("/order/{$id}")->with(['status' => 'order-canceled']);
    }

    public function incomplete(string $id)
    {
        $order = Order::find($id);
        $order->status = 'incomplete_sent';
        $order->save();

        return redirect("/order/{$id}")->with(['status' => 'order-incompleted']);
    }
}
