@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Mensajes
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Mensajes</li>
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
          <h3 class="box-title">Editar Mensaje Redes Sociales</h3>
        </div>
        <form class="form-horizontal" action="{{URL::to(route('message.update'))}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input name="_method" type="hidden" value="PUT">
          <div class="box-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Mensaje de Perfil</label>
              <div class="col-md-10">
                <input type="text" name="profileMessage" class="form-control" value="{{ $message->profileMessage }}" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Mensaje de SRI</label>
              <div class="col-md-10">
                <input type="text" name="SRIMessage" class="form-control" value="{{ $message->SRIMessage }}" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Mensaje de Declaracion Patrimonial</label>
              <div class="col-md-10">
                <input type="text" name="deputyMessage" class="form-control" value="{{ $message->deputyMessage }}" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Mensaje de Superintendencia</label>
              <div class="col-md-10">
                <input type="text" name="companiesMessage" class="form-control" value="{{ $message->companiesMessage }}" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Mensaje de Antecedentes Judiciales</label>
              <div class="col-md-10">
                <input type="text" name="judicialMessage" class="form-control" value="{{ $message->judicialMessage }}" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Mensaje de Antecedentes Penales</label>
              <div class="col-md-10">
                <input type="text" name="penalMessage" class="form-control" value="{{ $message->penalMessage }}" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Mensaje de Senecyt</label>
              <div class="col-md-10">
                <input type="text" name="senecytMessage" class="form-control" value="{{ $message->senecytMessage }}" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Mensaje de Contraloria</label>
              <div class="col-md-10">
                <input type="text" name="comptrollerMessage" class="form-control" value="{{ $message->comptrollerMessage }}" required/>
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
