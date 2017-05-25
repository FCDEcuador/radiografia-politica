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


      if($bannerPhoto!= null){
        $banner["banner"] = $this->savePhoto($id,$bannerPhoto);
        $banner->update();
      }
      return true;
    }


    function savePhoto($id,$photo){

      if(collect($this->imageValidsExtensions)->contains($photo->getClientOriginalExtension())){
        $storage_path = public_path()."/img/banner";
        $fileName = $this->nameGenerator($id."-"."-").".".$photo->getClientOriginalExtension();
        $photo->move($storage_path,$fileName);
        $relativePath = "/img/categories/".$fileName;
        return $relativePath;
      }else{
        throw new ApiException(["Fotografía inválida, solo se admite png, jpg, jpge"]);
      }
    }
}
