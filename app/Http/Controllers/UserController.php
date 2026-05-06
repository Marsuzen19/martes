<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Career; //agregue esto puede dar error



class UserController extends Controller
{
    public function create()
    {
        $careers = Career::all(); // Traer todas las carreras
        return view('register', compact('careers'));
    }
    public function store(Request $request)
    {
        // 1. Validamos los campos que vienen del formulario (los "name" del HTML)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'career_id' => 'required|exists:careers,id',
            'terms_accepted' => 'accepted',
        ]);
        // voy a cambiar el nombre de user::create
        User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'career_id' => $request->career_id,
            'terms_accepted' => $request->has('terms_accepted'),
        ]);
        return redirect()->route('register')->with('success', 'Usuario registrado exitosamente');
    }
}
