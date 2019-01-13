@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    categorias
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Categoria</li>
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
          <h3 class="box-title">Editar Cargo</h3>
        </div>
        <form class="form-horizontal" action="{{URL::to(route('categorias.update',$categorias->id))}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input name="_method" type="hidden" value="PUT">
          <div class="box-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Nombre</label>
              <div class="col-md-10">
                <input type="text" name="nombre" class="form-control" value="{{ $categorias->nombre }}" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Estado</label>
              <div class="col-md-10">
                <select class="form-control" name="estado" id="estado" >
                  <option value="1" <?php echo ($categorias->estado == 1) ?  'selected' : ''; ?> >Activo</option>
                  <option value="0" <?php echo ($categorias->estado == 0) ?  'selected' : ''; ?> >Inactivo</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="slug">URL</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="slug" id="slug" value="{{ $categorias->slug }}" required>
               </div> 
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="meta_description">Descripción</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="meta_description" id="meta_description" value="{{ $categorias->meta_description }}" required>
              </div> 
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="meta_keywords">Keywords</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" value="{{ $categorias->meta_keywords }}" required>
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
