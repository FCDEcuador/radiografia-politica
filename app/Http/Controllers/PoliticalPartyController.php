<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PoliticalPartyRepository;

class PoliticalPartyController extends Controller
{

  protected $repository;

  function __construct(PoliticalPartyRepository $repository)
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
        $political_parties = $this->repository->all();
        return view('administration.political_parties.index')->with('political_parties',$political_parties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administration.political_parties.create');
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
          return redirect(route('judgment_type.create'))->with('success', 'Partido Politico creado exitosamente!');
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
        $political_party = $this->repository->find($id);
        return view('administration.political_parties.edit')->with('political_party', $political_party);
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
          return redirect(route('political_party.index'))->with('success', 'Partido Politico editado exitosamente!');
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
