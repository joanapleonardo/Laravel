<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function createUser(Request $request)
    {
        $myUser = $request->all();

        $request -> validate(
            [
                'email' => 'required|email|unique:users',
                'name' => 'required|string',
                'password' => 'required',
            ]
            );

        User::insert([
            'email' => $request -> email,
            'name' => $request -> name,
            'password' => Hash::make($request -> password),
        ]);

        return redirect('/')->with('message', 'Registado com sucesso.');
    }
}