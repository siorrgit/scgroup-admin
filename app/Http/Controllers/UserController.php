<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->whereNotNull('id')->get();
        $shops = Shop::all();

        return view('user.index', [
            'users' => $users,
            'shops' => $shops
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        return view('user.detail', [
            'user' => $user,
        ]);
    }

    public function destroy(int $id)
    {
        $user = User::find($id)->delete();

        return redirect("/user/{$id}")->with(['status' => 'user-deleted']);
    }

    public function activate(int $id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();

        return redirect("/user/{$id}")->with(['status' => 'user-activated']);
    }
}
