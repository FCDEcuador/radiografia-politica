<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PositionRepository;
use App\Models\Categoria;
use App\Models\Position;

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
        $categorias = Categoria::activas()->pluck('nombre', 'id');
        return view('administration.position.create')->with('categorias',$categorias);
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
        $objPosition = new Position;
        
        $objPosition->name = $request->input('name');

        if($objPosition->save()){
            $objPosition->categorias()->detach();
            if ($request->has('categorias')){
                foreach($request->input('categorias') as $key => $val){
                    $objCategoria = Categoria::find($val);
                    $objPosition->categorias()->save($objCategoria);
                }
            }    
            // Guardamos las categorias
            return redirect(route('position.index'))->with('success', 'Cargo creado exitosamente!');
        }

        return redirect()->back()->with('errors', 'Ha ocurrido un error!');
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
        $data = array(
            'position' => $this->repository->find($id),
            'categorias' => Categoria::activas()->pluck('nombre', 'id'),
        );
        //$position = $this->repository->find($id);
        //$categorias = Categoria::activas()->pluck('nombre', 'id');
        return view('administration.position.edit',$data);
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
        if($id){
            $objPosition = Position::find($id);
            if($objPosition){
                $objPosition->name = $request->input('name');

                if($objPosition->save()){
                    $objPosition->categorias()->detach();
                    if ($request->has('categorias')){
                        foreach($request->input('categorias') as $key => $val){
                            $objCategoria = Categoria::find($val);
                            $objPosition->categorias()->save($objCategoria);
                        }
                    }    
                    // Guardamos las categorias
                    return redirect(route('position.index'))->with('success', 'Cargo editado exitosamente!');
                }
                return redirect()->back()->with('errors', 'Error al editar');

            }
            return redirect()->back()->with('errors', 'Error al editar');
        }
        return redirect()->back()->with('errors', 'Error al editar'); 
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
