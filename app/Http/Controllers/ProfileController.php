<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProfileRepository;
use App\Models\PoliticalParty;
use App\Models\Position;
use App\Models\JudgmentType;
use App\Profile;
use Auth;
use App\Exceptions\ApiResponseException;

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
    return view('administration.profiles.edit')->with(
      [
        'politicalParties' => $politicalParties,
        'profile' => $profile,
        'years' => $years,
        'judgment_types' => JudgmentType::all()
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
    } catch (ApiResponseException $e) {
        return redirect()->back()->with('errors', collect($e->errors)->first());
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
