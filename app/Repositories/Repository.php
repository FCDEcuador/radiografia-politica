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

  }

  public function delete($id)
  {

  }

  public function get($id)
  {

  }

  public function all()
  {
    return $model->all();
  }

}
