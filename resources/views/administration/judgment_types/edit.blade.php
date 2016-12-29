@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tipo de Delito
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Tipo de Delito</li>
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
          <h3 class="box-title">Editar Tipo de Delito</h3>
        </div>
        <form class="form-horizontal" action="{{URL::to(route('judgment_type.update',$judgment_type->id))}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input name="_method" type="hidden" value="PUT">
          <div class="box-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Nombre</label>
              <div class="col-md-10">
                <input type="text" name="name" class="form-control" value="{{ $judgment_type->name }}" required/>
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
