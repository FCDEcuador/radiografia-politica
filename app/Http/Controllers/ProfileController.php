<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProfileRepository;
use App\Models\PoliticalParty;
use App\Models\Position;
use App\Models\JudgmentType;
use App\Profile;
use App\Models\Message;
use Auth;
use App\Validator\ProfileValidator;
use UmpactoSoluciones\Tools\Exceptions\ApiException;
use Excel;
use App\Excel\Export\ProfileExport;

class ProfileController extends Controller
{
  protected $repository;

  function __construct(ProfileRepository $repository)
  {
    $this->repository = $repository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $profiles = $this->repository->all();
      return view('administration.profiles.index')->with('profiles',$profiles);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $positions = Position::all();
      return view('administration.profiles.create')->with('positions', $positions);
  }


  public function editProfile($id)
  {
    $positions = Position::all();
    $profile = $this->repository->find($id);
    return view('administration.profiles.edit_profile')->with(['positions'=> $positions,'profile' => $profile]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    if($this->repository->create($request->all()))
    {
      return redirect(route('profile.create'))->with('success', 'Usuario creado exitosamente!');
    }else {
        return redirect()->back()->with('errors', 'El email ya existe!');
    }
  }

  public function updateProfile(Request $request,$id)
  {
    if($this->repository->updateProfile($id,$request->all()))
    {
      return redirect(route('profile.index'))->with('success', 'Perfil actualizado exitosamente!');
    }else {
        return redirect()->back()->with('errors', 'El email ya existe!');
    }
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function view($id)
  {
      $profile = $this->repository->find($id);
      $binomial = null;
      if($profile->person->isPresident()){
       $binomial = $profile->person->politicalParty->vicePresident();
     }
     if($profile->person->isVicePresident()){
       $binomial = $profile->person->politicalParty->president();
     }
     $message = Message::first();
     return view('perfil')->with(['profile' => $profile, 'binomial' =>$binomial , 'message' =>$message]);
  }

  public function export(ProfileExport $export,$id)
  {
   return $export->handleExportWithId($id);
   $profile = $this->repository->find($id);
    return view('excel.profile.data')->with(['profile' => $profile]);
  }

  private function generateLastYears($last=6)
  {
    $years = [];
    $startDate = date('Y') - $last;
    for ($i=$startDate; $i<=date('Y');$i++)
    {
      array_push($years,(string)$i);
    }
    return $years;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $politicalParties = PoliticalParty::all();
    $profile = $this->repository->find($id);
    $years = $this->generateLastYears();
    $validator = app()->make(ProfileValidator::class);
    $canPublish = $validator->validate($id);
    return view('administration.profiles.edit')->with(
      [
        'politicalParties' => $politicalParties,
        'profile' => $profile,
        'years' => $years,
        'judgment_types' => JudgmentType::all(),
        'canPublish' => $canPublish
      ]
    );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try {
      if($this->repository->update($id,$request))
      {
        return redirect(route('profile.edit',$id))->with('success', 'Perfil editado exitosamente!');
      }else {
          return redirect()->back()->with('errors', 'Error al editar');
      }
    } catch (ApiException $e) {
        return redirect()->back()->with('errors', collect($e->errors)->first());
    }


  }

  public function publish(Request $request,$id)
  {

    $validator = app()->make(ProfileValidator::class);
    if($validator->validate($id))
    {
      $this->repository->publish($id);

      $profile = $this->repository->find($id);
      if($profile->person->isPresident() || $profile->person->isVicePresident())
      {
          return redirect(route('candidates.president.published'))->with('success', 'Perfil publicado!');
      }else if($profile->person->isAsambleista()){
          return redirect(route('candidates.asambleistas.published'))->with('success', 'Perfil publicado!');
      }else {
          return redirect(route('public-servants.published'))->with('success', 'Perfil publicado!');
      }
    }else {
        return redirect()->back()->with('errors', "El perfil no esta completo!. Debe completar para publicar.");
    }




  }

  public function unpublish(Request $request, $id)
  {
    $this->repository->unpublish($id);
    $profile = $this->repository->find($id);
    if($profile->person->isPresident() || $profile->person->isVicePresident())
    {
        return redirect(route('candidates.president.drafts'))->with('success', 'Perfil movido a borradores!');
    }else if($profile->person->isAsambleista()){
        return redirect(route('candidates.asambleistas.drafts'))->with('success', 'Perfil movido a borradores!');
    }else {
        return redirect(route('public-servants.drafts'))->with('success', 'Perfil movido a borradores!');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //$this->authorize('delete', Profile::find($id));
      return response()->json(['sucess' => $this->repository->delete($id)],200);
  }
}
