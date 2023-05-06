<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function store(Request $request) // thêm mới
    {
        $user = new user([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
        $request->all();
        $user->save();
        return response()->json($user);
    }
}
