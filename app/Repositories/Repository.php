<?php

namespace App\Repositories;

abstract class Repository
{

  protected $model;

  public function create($data)
  {
      if($this->model->create($data) != null)
      {
          return true;
      }else {
        return false;
      }
  }

  public function update($id, $data)
  {
    $m = $this->model->find($id);
    return $m->update($data);

  }

  public function delete($id)
  {
    $m =  $this->model->find($id);
    return $m->delete();
  }

  public function find($id)
  {
    return $this->model->find($id);
  }

  public function all()
  {
    return $this->model->all();
  }

}
