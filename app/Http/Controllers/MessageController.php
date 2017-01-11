<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MessageRepository;
use App\Exceptions\ApiResponseException;

class MessageController extends Controller
{

  protected $repository;

  function __construct(MessageRepository $repository)
  {
    $this->repository = $repository;
  }


  public function edit(){
    $message = $this->repository->first();
    return view('administration.messages.edit')->with('message', $message);

  }

  public function update(Request $request){

    try{
    if($this->repository->update(null,$request))
    {
      return redirect(route('message.edit'))->with('success', 'Mensajes editados exitosamente!');
    }else {
        return redirect()->back()->with('errors', 'Error al editar');
    }
    } catch (ApiResponseException $e) {
      return redirect()->back()->with('errors', collect($e->errors)->first());
    }

  }


}
