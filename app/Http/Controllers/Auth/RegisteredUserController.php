<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => [ 'required','string', 'max:255'],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [ 'required', 'confirmed', Password::defaults()]

        ]);

 //Siempre debemos encriptar la contraseña antes de guardarla

       User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        //También se puede encriptar la contraeña con Hash::make($request->password)

      // autenticar automaticamente:   Auth::login($user);

        return to_route('login')->with('status', 'Su cuenta fue creada con éxito');
    }
}
