<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\DocumentoCreateRequest;
use App\Http\Requests\DocumentoUpdateRequest;
use App\Repositories\DocumentoRepository;
use App\Repositories\CategoriaRepository;

/**
 * Class DocumentosController.
 *
 * @package namespace App\Http\Controllers;
 */
class DocumentosController extends Controller
{
    /**
     * @var DocumentoRepository
     */
    protected $repository;

    /**
     * @var DocumentoValidator
     */
    protected $validator;

    /**
     * DocumentosController constructor.
     *
     * @param DocumentoRepository $repository
     * @param DocumentoValidator $validator
     */
    public function __construct(DocumentoRepository $repository, CategoriaRepository $categoriaRepository)
    {
        $this->repository = $repository;
        $this->categoriaRepository = $categoriaRepository;
        //$this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $documentos = $this->repository->paginate(10);

        return view('admin.documentos.index', compact('documentos'));
    }


    public function create()
    {
        $categorias = $this->categoriaRepository->pluck('nome','id');

        return view('admin.documentos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DocumentoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DocumentoCreateRequest $request)
    {
        try {

            //$this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $dados = $request->all();

            $dados['id_cliente'] = \Auth::user()->id;
            $dados['id_categoria'] = \Auth::user()->id;

            $documento = $this->repository->create($dados);

            $response = [
                'message' => 'Documento criado.',
                'data'    => $documento->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
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
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $documento,
            ]);
        }

        return view('admin.documentos.show', compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = $this->repository->find($id);

        $categorias = $this->categoriaRepository->pluck('nome','id');


        return view('admin.documentos.edit', compact('documento', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DocumentoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DocumentoUpdateRequest $request, $id)
    {
        try {

            //$this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $documento = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Documento alterado.',
                'data'    => $documento->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            $url = $request->get('redirect_to', route('documentos.index'));
            $request->session()->flash('message', 'Documento alterado!');
            return redirect()->to($url);

        } catch (ValidatorException $e) {

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
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
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
