@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Partido Politico
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Partido Politico</li>
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
          <h3 class="box-title">Editar Partido Politico</h3>
        </div>
        <form class="form-horizontal" action="{{URL::to(route('political_party.update',$political_party->id))}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input name="_method" type="hidden" value="PUT">
          <div class="box-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Nombre</label>
              <div class="col-md-10">
                <input type="text" name="name" class="form-control" value="{{ $political_party->name }}" required/>
              </div>
            </div>
            <div class="col-md-4">
              <label>Foto Partido Politico</label><br>
              <img class="img-circle" data-src="{{ (isset($political_party->picture)) ? $political_party->picture : 'holder.js/150x150' }}" />
              <input type="file" name="profile" placeholder="ingrese">
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
