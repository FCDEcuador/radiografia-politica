<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Profile;
use App\Models\Site;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Iniializamos en la categoria numero 1 para siempre mostrar principales autoridades
        $aliasCategoria = 'principales-autoridades';

        $objCategoria = Categoria::bySlug($aliasCategoria);

        if(!$objCategoria){
                return redirect('/');
        }


        $objProfile = Profile::perfilesCategorias($objCategoria->id)->get();

        $data = array(
            'site' => Site::where('id',1)->first(),
            'categorias' => Categoria::activas()->get(),
            'objProfile' => $objProfile,
            'objCategoria' => $objCategoria,
        );  
      
      return view('home',$data);
      
    }
}
