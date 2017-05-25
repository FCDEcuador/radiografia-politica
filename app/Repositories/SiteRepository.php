<?php

namespace App\Repositories;

use App\Models\Site;

class SiteRepository extends Repository
{

  private $imageValidsExtensions = ['png','jpg','jpge'];

    function __construct(Site $model)
    {
      $this->model = $model;
    }

    function updateBanner($id,$request){

      $banner = $this->find($id);

      $bannerPhoto = $request->file("photo");

      $data = $request->all();
      if($bannerPhoto!= null){
        $banner["banner"] = $this->savePhoto($data,$bannerPhoto);
        $banner->update();
      }
      return parent::update($id,$data);
    }


    function savePhoto($data,$photo){

      if(collect($this->imageValidsExtensions)->contains($photo->getClientOriginalExtension())){
        $storage_path = public_path()."/img/banner";
        $fileName = $this->nameGenerator($data['id']."-"."-").".".$photo->getClientOriginalExtension();
        $photo->move($storage_path,$fileName);
        $relativePath = "/img/categories/".$fileName;
        return $relativePath;
      }else{
        throw new ApiException(["Fotografía inválida, solo se admite png, jpg, jpge"]);
      }
    }
}
