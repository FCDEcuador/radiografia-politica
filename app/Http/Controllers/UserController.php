<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\Role;
use App\User;
use Auth;

class UserController extends Controller
{
    protected $repository;

    function __construct(UserRepository $repository)
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
        $users = $this->repository->all();
        return view('administration.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('administration.users.create')->with('roles', $roles);
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
        return redirect(route('user.create'))->with('success', 'Usuario creado exitosamente!');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $roles = Role::all();
      $user = $this->repository->find($id);
      return view('administration.users.edit')->with(['roles' => $roles,'user' => $user]);
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
      if($this->repository->update($id,$request->all()))
      {
        return redirect(route('user.edit',$id))->with('success', 'Usuario editado exitosamente!');
      }else {
          return redirect()->back()->with('errors', 'Error al editar');
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
        $this->authorize('delete', User::find($id));
        return response()->json(['sucess' => $this->repository->delete($id)],200);
    }
}
