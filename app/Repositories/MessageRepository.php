<?php
namespace App\Repositories;

use App\Models\Message;

class MessageRepository extends Repository
{
  function __construct(Message $model)
  {
    $this->model = $model;
  }

  public function first(){
    $message = $this->model->first();
    if($message == null){
      $message = new Message();
      $message->save();
      $message = $this->model->first();
    }
    return $message;
  }

  public function update($id,$request){
    $message = $this->model->first();
    return $message->update($request->all());

  }


}
