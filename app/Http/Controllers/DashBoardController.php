<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\UserRequest;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = \App\User::orderBy('name')->get();
        $mensagem = $request->session()->get('mensagem');
        return view("dashboard.index", compact('usuarios', 'mensagem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        \App\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password)
        ]);

        $request->session()->flash('mensagem', 'Usuário criado com sucesso!');
        return redirect()->route('listar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = \App\User::find($id);
        return view('dashboard.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = \App\User::find($id);
        return view('dashboard.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $usuario = \App\User::find($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = \Hash::make($request->password);
        $usuario->save();

        return redirect()->route('listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        \App\User::destroy($request->id);

        $request->session()->flash('mensagem', 'Usuário excluido com sucesso!');

        return redirect()->route('listar');
    }
}
