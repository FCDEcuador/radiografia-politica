@extends('layouts.admin')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Perfil
      <small>Nuevo</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Perfil</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Ingresar Perfil</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{URL::to(route('profile.update.general',$profile->id))}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="box-body">
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$profile->person->name}}" placeholder="Ingrese el nombre" required>
              </div>
              <div class="form-group">
                <label for="email">Apellido</label>
                <input type="text" class="form-control" name="lastname" id="lastname" value="{{$profile->person->lastname}}" placeholder="Ingrese el apellido" required>
              </div>
              <div class="form-group">
                <label>Cargo</label>
                <select name="position" class="form-control" required>
                @foreach ($positions as $position)
                  @if($position->id == $profile->person->position_id)
                  <option value="{{$position->id}}" selected>{{$position->name}}</option>
                  @else
                    <option value="{{$position->id}}">{{$position->name}}</option>
                  @endif
                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="isCandidate">Es Candidato</label>
                  @if($profile->person->is_candidate)
                    <input type="checkbox" name="isCandidate" id="isCandidate" checked="true">
                  @else
                    <input type="checkbox" name="isCandidate" id="isCandidate">
                  @endif
              </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </form>
        </div>
        <!-- /.box -->

      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
@endsection
