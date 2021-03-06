<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Repositories\CategoriaRepository;

class CategoriaController extends Controller
{


    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categorias = Categoria::paginate(5);

        $categorias = $this->repository->paginate(10);

        return View('admin.categorias.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            //$this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $request->all();
            $documento = $this->repository->create($dados);

            $response = [
                'message' => 'Categoria criada.',
                'data'    => $documento->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            $url = $request->get('redirect_to', route('categorias.index'));
            $request->session()->flash('message', 'Categoria criada!');
            return redirect()->to($url);

            //return redirect()->to(\URL::previous());
            //return redirect()->back()->with('message', $response['message']);
        }

        catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }
            return redirect()->to(\URL::previous());
            //return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $data = $request->all();
        $categoria->fill($data);
        $categoria->save();
        $url = $request->get('redirect_to', route('categorias.index'));
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Documento deleted.',
                'deleted' => $deleted,
            ]);
        }


        \Session::flash('message', 'Documento excluído!');

        return redirect()->to(\URL::previous());
    }
}
