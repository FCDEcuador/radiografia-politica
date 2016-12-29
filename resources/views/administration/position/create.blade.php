@extends('layouts.admin')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cargo
      <small>Nuevo</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li>Cargo</li>
      <li class="active">Nuevo</li>
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
            <h3 class="box-title">Ingresar Cargo</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{URL::to(route('position.store'))}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="box-body">
              <div class="form-group">
                <label for="name">Cargo</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre del cargo" required>
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
