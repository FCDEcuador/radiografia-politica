<?php
namespace App\Repositories;

use App\Models\PoliticalParty;
use App\Exceptions\ApiResponseException;
use Auth;

class PoliticalPartyRepository extends Repository
{
  private $validsExtensions = ['png','jpg','jpge'];

  function __construct(PoliticalParty $model)
  {
    $this->model = $model;
  }

  function clean($string) {
     $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
     return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
  }

  private function nameGenerator($string)
  {
    $name = "";
    $string = mb_strtolower($string,'UTF-8');
    $name = $this->clean($string);
    return $name;
  }

  function create($request)
  {

      $file = $request->file('logo');
      $name = $request->get('name');
      if(collect($this->validsExtensions)->contains($file->getClientOriginalExtension()))
      {
        $storage_path = public_path()."/img/political-parties";
        $filename  = $this->nameGenerator($name).".".$file->getClientOriginalExtension();
        $file->move($storage_path,$filename);
        $relativePath = "/img/political-parties/".$filename;
        $data = [
          'name' => $name,
          'img' => $relativePath,
          'user_id' => Auth::user()->id
        ];

        return $this->model->create($data) != null;
      }else {
        throw new ApiResponseException(["Fotografía inválida, solo se admite png, jpg, jpge"]);
      }

  }


  function update($id,$request)
  {

    $file = $request->file('logo');
    $name = $request->get('name');
    if($file==null){
      $data = [
        'name' => $name,
        'user_id' => Auth::user()->id
      ];
      $temp = $this->model->find($id);
      return $temp->update($data) != null;
    }else{
      if(collect($this->validsExtensions)->contains($file->getClientOriginalExtension()))
      {
        $storage_path = public_path()."/img/political-parties";
        $filename  = $this->nameGenerator($name).".".$file->getClientOriginalExtension();
        $file->move($storage_path,$filename);
        $relativePath = "/img/political-parties/".$filename;
        $data = [
          'name' => $name,
          'img' => $relativePath,
          'user_id' => Auth::user()->id
        ];

        $temp = $this->model->find($id);
        return $temp->update($data) != null;
      }else {
        throw new ApiResponseException(["Fotografía inválida, solo se admite png, jpg, jpge"]);
      }
    }
  }


}
