<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SiteRepository;

class SiteController extends Controller
{
    //
    protected $repository;

    function __construct(SiteRepository $repository)
    {
      $this->repository = $repository;
    }

    public function edit()
    {

      $banner = $this->repository->all();
      return view('administration.banner.edit')->with(['banner' => $banner]);
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

      if($this->repository->updateBanner($id,$request->all()))
      {
        return redirect(route('banner.edit',$id))->with('success', 'Banner editado exitosamente!');
      }else {
          return redirect()->back()->with('errors', 'Error al editar');
      }
    }
}
