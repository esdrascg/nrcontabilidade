<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(5);
        return view('admin.users.index', ['usuarios' => $usuarios]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        //if(!($usuario = User::find($usuario))){

        //}

        return view('admin.users.edit', compact('usuario') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $data = $request->all();
        $usuario->fill($data);
        $usuario->save();

        return redirect()->route('usuarios.index');

        //return view('admin.users.index', ['usuario' => $usuario]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}
