<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $registro) {
        $registro->request->add(['username' => Str::slug($registro->username)]);

        $this->validate($registro, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $registro->name,
            'username' => $registro->username,
            'email' => $registro->email,
            'password' => Hash::make($registro->password)
        ]);

        //Autenticar una vez creada la cuenta de usuario
        auth()->attempt($registro->only('email', 'password'));

        return redirect()->route('posts.index');
    }
}
