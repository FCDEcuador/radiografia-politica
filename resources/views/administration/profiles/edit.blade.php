@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Usuarios
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Usuarios</li>
    <li class="active">Editar</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- /.row -->
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Ingresar Usuario</h3>
        </div>
        <form class="form-horizontal" action="{{URL::to(route('user.update',$user->id))}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input name="_method" type="hidden" value="PUT">
          <div class="box-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Nombre</label>
              <div class="col-md-10">
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Email</label>
              <div class="col-md-10">
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Rol</label>
              <div class="col-md-10">
                <select name="role" class="form-control" required>
                  @foreach ($roles as $role)
                  @if($role->id == $user->role_id)
                  <option value="{{$role->id}}" selected>{{$role->name}}</option>
                  @else
                  <option value="{{$role->id}}">{{$role->name}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.row -->
</section>
@endsection
