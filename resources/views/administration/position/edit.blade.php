@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cargos
    <small>Editar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li>Cargos</li>
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
        <form class="form-horizontal" action="{{URL::to(route('position.update',$position->id))}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input name="_method" type="hidden" value="PUT">
          <div class="box-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Nombre</label>
              <div class="col-md-10">
                <input type="text" name="name" class="form-control" value="{{ $position->name }}" required/>
              </div>
            </div>
             <div class="form-group">
                <label class="col-md-2 control-label">Categoría</label>
                <div class="col-md-10">
                
                  <select name="categorias[]" id="categorias" class="form-control" required multiple="multiple">
                    <option value="">Selecciona una categoría</option>
                   @if(count($categorias))
                    @foreach ($categorias as $id => $categoria)    
                    
                      @if(in_array($id, $position->categorias()->pluck('id')->all()))
                        <option value="{{ $id }}" selected="selected">{{ $categoria }}</option>
                      @else
                        <option value="{{ $id }}">{{ $categoria }}</option>
                      @endif
                    @endforeach
                   @endif
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
