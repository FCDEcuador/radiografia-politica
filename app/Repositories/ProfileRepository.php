<?php
namespace App\Repositories;

use App\Models\Profile;
use App\Models\State;
use Illuminate\Support\Facades\Config;
use Auth;
use DB;

class ProfileRepository extends Repository
{
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
        $personData["is_candidate"] = ($data["isCandidate"] == "on") ? true : false;
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


}
