<?php

namespace App\Http\Controllers;

use App\Criteria\FindByUserCriteria;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $logado = auth()->user()->name;

        $codigo_usuario = \Auth::user()->id;

        //$usuarios = User::paginate(10);

        $usuarios = $this->repository->paginate(10);

        return view('admin.users.index', compact('usuarios','logado', 'codigo_usuario', 'search' ) );

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
    public function store(UserRequest $request)
    {

        User::create($request->all());

        $url = $request->get('redirect_to', route('usuarios.index'));
        $request->session()->flash('message', 'Usuário cadastrado com sucesso!');

        //\Session::flash('message', 'Usuário cadastrado com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $categoria
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
     * @param  \App\Models\User  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $usuario)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        //dd($data);

        $usuario->fill($data);
        $usuario->save();

        $url = $request->get('redirect_to', route('usuarios.index'));

        return redirect()->to($url);

        //return redirect()->route('usuarios.index');

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

        \Session::flash('message', 'Usuário excluído com sucesso!');

        return redirect()->to(\URL::previous());
    }
}
