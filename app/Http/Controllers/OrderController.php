<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shop;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function incompletes(Request $request)
    {
        $orders = Order::query()
            ->whereIn('status', ['incomplete_sent', 'incomplete_notified']);

        $text = $request->query('text');
        if (!empty($text)) {
            $orders = $orders->where('number', 'like', "%{$text}%");

            // ToDo: Implement search by user name
            //
            // $orders = $orders->where(function ($query) use ($text) {
            //     $query->where('number', 'like', "%{$text}%")
            //         ->orWhere('user.last_name', 'like', "%{$text}%")
            //         ->orWhere('user.first_name', 'like', "%{$text}%");
            // });
        }

        return view('order.index', [
            'orders' => $orders->get(),
            'shops' => Shop::all(),
        ]);
    }

    public function completes(Request $request)
    {
        $orders = Order::query()
            ->whereIn('status', ['complete_apppayed', 'complete_shoppayed', 'complete_canceled']);

        // ToDo:
        // 1週間分のデータを取得
        // シーダーも直近1週間前後のデータを作成するように変更

        $text = $request->query('text');
        if (!empty($text)) {
            $orders = $orders->where('number', 'like', "%{$text}%");

            // ToDo: Implement search by user name
            //
            // $orders = $orders->where(function ($query) use ($text) {
            //     $query->where('number', 'like', "%{$text}%")
            //         ->orWhere('user.last_name', 'like', "%{$text}%")
            //         ->orWhere('user.first_name', 'like', "%{$text}%");
            // });
        }

        return view('order.index', [
            'orders' => $orders->get(),
            'shops' => Shop::all(),
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
