<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\judgment_typeRepository;

class JudgmentTypeController extends Controller
{

  protected $repository;

  function __construct(judgment_typeRepository $repository)
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
        //
        $judgment_types = $this->repository->all();
        return view('administration.judgment_types.index')->with('judgment_types',$judgment_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.judgment_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($this->repository->create($request->all()))
        {
          return redirect(route('judgment_type.create'))->with('success', 'Delito creado exitosamente!');
        }else {
            return redirect()->back()->with('errors', 'Ha ocurrido un error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $judgment_type = $this->repository->find($id);
        return view('administration.judgment_types.edit')->with('judgment_type', $judgment_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($this->repository->update($id,$request->all()))
        {
          return redirect(route('judgment_type.index'))->with('success', 'Delito editado exitosamente!');
        }else {
            return redirect()->back()->with('errors', 'Error al editar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return response()->json(['sucess' => $this->repository->delete($id)],200);
    }
}
