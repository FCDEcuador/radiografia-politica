@extends('layouts.admin')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Categoría
      <small>Nuevo</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li>Categoría</li>
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
            <h3 class="box-title">Ingresar Categoría</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{URL::to(route('categorias.store'))}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="box-body">
              <div class="form-group">
                <label for="nombre">Categoría</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del Categoría" required>
              </div>
              <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" name="estado" id="estado" >
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
              <div class="form-group">
                <label for="slug">URL</label>
                <input type="text" class="form-control" name="slug" id="slug" placeholder="Ingrese el url" required>
              </div>
              <div class="form-group">
                <label for="meta_description">Meta description</label>
                <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Ingrese el meta description" required>
              </div>
              <div class="form-group">
                <label for="meta_keywords">Meta keywords</label>
                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Ingrese los meta keywords" required>
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
