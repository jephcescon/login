<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function create()
    {
        return view('entrar.index');
    }

    public function store(Request $request){

        $data = $request->except('_token');
        $data['password'] = \Hash::make($request->password);
        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('listar');
    }
}
