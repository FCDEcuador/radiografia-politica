<?php
namespace App\Repositories;

use App\Models\Profile;
use App\Models\State;
use App\Models\Timeline;
use Illuminate\Support\Facades\Config;
use App\Exceptions\ApiResponseException;
use Auth;
use DB;
use File;

class ProfileRepository extends Repository
{
  private $imageValidsExtensions = ['png','jpg','jpge'];
  private $docsValidsExtensions = ['doc','docx','xls','xlsx','pdf','ppt','pptx'];
  private $personRepository;

  function __construct(Profile $model, PersonRepository $personRepository)
  {
    $this->model = $model;
    $this->personRepository = $personRepository;
  }

  public function create($data)
  {

    return DB::transaction(function () use($data) {
      $profile = new Profile();
      $profile->user_id = Auth::user()->id;
      if($profile->save())
      {
        $personData = [];
        $personData['user_id'] =  Auth::user()->id;
        $personData['name'] = $data["name"];
        $personData["lastname"] = $data["lastname"];
        $personData["position_id"] = $data["position"];
        $personData["is_candidate"] = (isset($data["isCandidate"]) && $data["isCandidate"] == "on") ? true : false;
        $personData["state_id"] = State::draft();
        $personData["profile_id"] = $profile->id;
        if($this->personRepository->create($personData))
        {
          DB::commit();
          return true;
        }else {
          DB::rollback();
          return false;
        }
      }else {
        return false;
      }
    });

  }

  public function update($id,$request)
  {
    $data = $request->all();
    $profile = $this->model->find($id);

    // UPDATE PROFILE DATA //
    if(!empty($data['name']) && !empty($data['lastname']))
    {
      $profile->person->name = $data['name'];
      $profile->person->lastname = $data['lastname'];
      $profile->person->politicalParty_id = ($data['politicalParty'] != "null" ) ? $data['politicalParty'] : null;
      $profile->person->description  = $data['description'];
      $profile->person->facebook = $data['facebook'];
      $profile->person->twitter = $data['twitter'];
      $profile->person->observatory = $data['observatory'];
      $profile->user_id =  Auth::user()->id;
      $profile->person->update();
    }else {
      throw new ApiResponseException(['Algunos campos son obligatorios']);
    }
    $profilePhoto = $request->file('profilePicture');
    if($profilePhoto != null)
    {
      $profile->picture = $this->saveProfilePhoto($profile,$profilePhoto);
      $profile->update();
    }

    $profilePhotoDetail = $request->file('detailPicture');
    if($profilePhotoDetail != null)
    {
      $profile->person->img = $this->saveProfilePhoto($profile,$profilePhotoDetail,true);
      $profile->person->update();
    }

    $curriculum = $request->file('curriculum');
    if($curriculum != null)
    {
      $profile->person->curriculum = $this->saveDocFile($profile,$curriculum,"curriculum");
      $profile->person->update();
    }else {
      if($data['curriculumDelete'] == "true")
      {
        File::delete(public_path().$profile->person->curriculum);
        $profile->person->curriculum = null;
        $profile->person->update();
      }
    }

    $plan = $request->file('gobermentPlan');
    if($plan != null)
    {
      $profile->person->plan = $this->saveDocFile($profile,$plan,"plan");
      $profile->person->update();
    }else {
      if($data['gobermentPlanDelete'] == "true")
      {
        File::delete(public_path().$profile->person->plan);
        $profile->person->plan = null;
        $profile->person->update();
      }
    }

    // END UPDATE PROFILE DATA
    // UPDATE TIMELINE
    $actualTimeLine = $profile->person->timelines->toArray();
    $ids = [];
    $data['timeline'] = (isset($data['timeline'])) ? $data['timeline'] : [];
    foreach ($data['timeline'] as $tm) {
      array_push($ids,$tm['id']);
    }
    $ids = collect($ids);
    $toDelete = [];
    foreach ($actualTimeLine as $timelineToSearch) {
      if(!$ids->contains($timelineToSearch['id']))
      {
        array_push($toDelete,$timelineToSearch);
      }
    }

    foreach ($toDelete as $tmDelete) {
      $m = Timeline::find($tmDelete['id']);
      $m->delete();
    }



    foreach ($data['timeline'] as $timeline) {
      if($timeline['id'] == "-1")
      {
        $newTimeLine = new Timeline();
        $newTimeLine->person_id = $profile->person->id;
        $newTimeLine->typeEvent = $timeline['type'];
        $newTimeLine->start = $timeline['startDate'];
        $newTimeLine->end = $timeline['endDate'];
        $newTimeLine->shortDescription = $timeline['title'];
        $newTimeLine->description = $timeline['description'];
        $newTimeLine->user_id = Auth::user()->id;
        $newTimeLine->important = $timeline['outstanding'];
        $newTimeLine->save();
      }
    }

    // END UPDATE TIMELINE
    return true;
    dd($request);
  }

  private function saveProfilePhoto($profile,$profilePhoto,$detail=false)
  {
    if(collect($this->imageValidsExtensions)->contains($profilePhoto->getClientOriginalExtension()))
    {
      $storage_path = public_path()."/img/perfiles";
      if($detail)
      {
        $filename  = $this->nameGenerator($profile->id."-".$profile->person->name.'-'.$profile->person->lastname)."-detail.".$profilePhoto->getClientOriginalExtension();
      }else {
        $filename  = $this->nameGenerator($profile->id."-".$profile->person->name.'-'.$profile->person->lastname).".".$profilePhoto->getClientOriginalExtension();
      }
      $profilePhoto->move($storage_path,$filename);
      $relativePath = "/img/perfiles/".$filename;
      return $relativePath;
    }else {
      throw new ApiResponseException(["Fotografía inválida, solo se admite png, jpg, jpge"]);
    }
  }

  private function saveDocFile($profile,$doc,$folder="default")
  {
    if(collect($this->docsValidsExtensions)->contains($doc->getClientOriginalExtension()))
    {
      $storage_path = public_path()."/docs/".$folder;
      $filename  = $this->nameGenerator($profile->id."-".$profile->person->name.'-'.$profile->person->lastname."-".$folder).".".$doc->getClientOriginalExtension();
      $doc->move($storage_path,$filename);
      $relativePath = "/docs/".$folder."/".$filename;
      return $relativePath;
    }else {
      throw new ApiResponseException(["Documento inválida, solo se admite pdf,doc,docx,xls,xls,ppt,pptx"]);
    }
  }


}
