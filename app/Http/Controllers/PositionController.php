<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PositionRepository;

class PositionController extends Controller
{

  protected $repository;

  function __construct(PositionRepository $repository)
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
        $positions = $this->repository->all();
        return view('administration.position.index')->with('positions',$positions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('administration.position.create');
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
          return redirect(route('position.create'))->with('success', 'Cargo creado exitosamente!');
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
        $position = $this->repository->find($id);
        return view('administration.position.edit')->with('position', $position);
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
          return redirect(route('position.index'))->with('success', 'Cargo editado exitosamente!');
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
      return response()->json(['sucess' => $this->repository->delete($id)],200);
    }
}
