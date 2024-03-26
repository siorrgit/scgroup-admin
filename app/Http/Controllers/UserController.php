<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $shops = Shop::all();

        return view('user.index', [
            'users' => $users,
            'shops' => $shops
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $user = User::find($id);

        return view('user.detail', [
            'user' => $user,
        ]);
    }
}
