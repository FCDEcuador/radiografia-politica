<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Profile;
use App\Models\Site;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::get();
        return view('administration.categorias.index')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Categoria::create($request->all()))
        {
          return redirect(route('categorias.create'))->with('success', 'Cargo creado exitosamente!');
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
    public function show($aliasCategoria)
    {
        //
        if(!$aliasCategoria){
            return redirect('/');
        }

        $objCategoria = NULL;

        $objCategoria = Categoria::bySlug($aliasCategoria);

        if(!$objCategoria){
                return redirect('/');
        }


        $objProfile = Profile::perfilesCategorias($objCategoria->id)->get();

        $data = array(
            'site' => Site::where('id',1)->first(),
            'objProfile' => $objProfile,
            'categorias' => Categoria::activas()->get(),
            'objCategoria' => $objCategoria,
        );  
      
        return view('home',$data);
        

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
        
            $categoria = Categoria::find($id);
            
        //$categorias = Categoria::activas()->get();
        return view('administration.categorias.edit')->with('categorias',$categoria);
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
        //Categoria::find($id)->fill($request->all())->save();

        if(Categoria::find($id)->fill($request->all())->save())
        {
          return redirect(route('categorias.index'))->with('success', 'Cargo editado exitosamente!');
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
    }
}
