<?php

namespace App\Excel\Export;

use App\Repositories\ProfileRepository;


class ProfileExport extends \Maatwebsite\Excel\Files\NewExcelFile
{
  public $id;
  public $repository;

  public function handleExportWithId($id)
  {
    $this->id = $id;
    $this->repository = app()->make(ProfileRepository::class);
    $profile = $this->repository->find($this->id);
    $this->setFilename( $this->repository->nameGenerator($profile->id."-".$profile->person->name."-".$profile->person->lastname));
    $this->setTitle($profile->person->name." ".$profile->person->lastname);
    $this->handleExport();
  }

  public function getFilename()
  {

    if(isset($this->repository))
    {
      $profile = $this->repository->find($this->id);
      return $this->repository->nameGenerator($profile->id."-".$profile->person->name."-".$profile->person->lastname);
    }else {
      return 'test';
    }

  }


}
