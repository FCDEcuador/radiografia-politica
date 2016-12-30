@extends('layouts.admin')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Partidos Politicos
      <small>Editar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li>Partidos Politicos</li>
      <li class="active">Editar</li>
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
            <h3 class="box-title">Ingresar Partido Politico</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{URL::to(route('political_party.store'))}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="box-body">
              <div class="form-group">
                <label for="name">Partido Politico</label>
                <input type="text" class="form-control" name="name" value="{{$political_party->name}}" id="name" placeholder="Ingrese el nombre del partido politico" required>
              </div>
              <div class="col-md-4">
                <label>Foto Partido Politico</label><br>
                <img class="img-tumbnail" src="{{ (isset($political_party->img)) ? url($political_party->img) : 'holder.js/150x150' }}" />
                <input type="file" name="logo" placeholder="ingrese">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Crear</button>


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
