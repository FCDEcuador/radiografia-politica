@extends('layouts.admin')

@section('content')
<?php

  function containsPosition($id,$companies)
  {
    foreach ($companies as $company) {
      if($company->position == $id){
        return true;
      }
    }
    return false;
  }

  function getTypeEvent($id)
  {
    switch ($id) {
      case '1':
        return "Pública";
      case '2':
          return "Privada";
      case '3':
          return "Política";
      default:
        return "";
    }
  }

  function getCompanyPosition($id)
  {
    switch ($id) {
      case '1':
        return "Presidente";
      case '2':
          return "Gerente";
      case '3':
          return "Accionista";
      default:
        return "";
    }
  }

  function getBooleanString($id)
  {
    switch ($id) {
      case '0':
        return "No";
      case '1':
          return "Sí";
      default:
        return "";
    }
  }
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Perfil
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
  <form id="publishForm" action="{{URL::to(route('profile.publish',$profile->id))}}" method="GET">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
  </form>
  <form id="editForm" action="{{URL::to(route('profile.update',$profile->id))}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <input name="_method" type="hidden" value="PUT">
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary pull-right" style="margin-left:10px;" form="publishForm" disabled="{{!$canPublish}}">Publicar</button>
        <button type="submit" class="btn btn-primary pull-right" form="editForm">Guardar</button>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Datos</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
              <div class="form-group">
                <div class="col-md-4">
                  <label>Foto Perfil</label><br>
                  <img class="img-circle" data-src="{{ (isset($profile->picture)) ? asset($profile->picture) : 'holder.js/150x150' }}" src="{{ (isset($profile->picture)) ? asset($profile->picture) : 'holder.js/150x150' }}" />
                  <input type="file" name="profilePicture" placeholder="ingrese">
                </div>
                <div class="col-md-8">
                    <label>Foto Detalle</label><br>
                  <img class="img-thumbnail" data-src="{{ (isset($profile->person->img)) ? asset($profile->person->img) : 'holder.js/200x150' }}" src="{{ (isset($profile->person->img)) ? asset($profile->person->img) : 'holder.js/200x150' }}" />
                  <input type="file" name="detailPicture" placeholder="ingrese">
                </div>
              </div>
              <br><br>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" name="name" value="{{$profile->person->name}}" id="name" placeholder="Ingrese el nombre" required>
                </div>
                <div class="col-md-6">
                  <label for="email">Apellido</label>
                  <input type="text" class="form-control" name="lastname"value="{{$profile->person->lastname}}"  id="lastname" placeholder="Ingrese el apellido" required>
                </div>
              </div>
              <div class="form-group">
                  <label for="politicalParty">Partido Político</label>
                  <select name="politicalParty" class="form-control">
                    <option value="null">-- Sin asignar --</option>
                    @foreach ($politicalParties as $politicalParty)
                      @if($politicalParty->id == $profile->person->politicalParty_id)
                        <option value="{{$politicalParty->id}}" selected>{{$politicalParty->name}}</option>
                      @else
                          <option value="{{$politicalParty->id}}">{{$politicalParty->name}}</option>
                      @endif
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="email">Descripción</label>
                <textarea class="textarea" name="description" placeholder="Escriba la descripción aquí" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$profile->person->description}}</textarea>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="name">Facebook</label>
                  <input type="text" class="form-control" name="facebook" value="{{$profile->person->facebook}}" id="facebook" placeholder="URL Facebook">
                </div>
                <div class="col-md-6">
                  <label for="email">Twitter</label>
                  <input type="text" class="form-control" name="twitter"value="{{$profile->person->twitter}}"  id="twitter" placeholder="@cuenta">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <div class="col-md-6">
                    <label for="curriculum">Curriculum</label>
                    <input type="file" class="form-control" name="curriculum"  placeholder="Ingrese el Curriculum">
                    <input type="hidden" name="curriculumDelete" id="curriculumDelete" value="false">
                  </div>
                  @if(!empty($profile->person->curriculum))
                    <div id="curriculum-controls">
                      <div class="col-md-3">
                          <br>
                        <a href="{{asset($profile->person->curriculum)}}" target="_blank"><button type="button" class="btn btn-primary">Descargar</button></a>
                      </div>
                      <div class="col-md-3">
                          <br>
                        <button type="button" class="btn btn-danger" id="deleteCurriculum">Borrar</button>
                      </div>
                    </div>
                  @endif
                </div>
                <div class="col-md-6">
                  <div class="col-md-6">
                    <label for="curriculum">Plan de Gobierno</label>
                    <input type="file" class="form-control" name="gobermentPlan"  placeholder="Ingrese el Plan de Gobierno">
                    <input type="hidden" name="gobermentPlanDelete" id="gobermentPlanDelete" value="false">
                  </div>
                  @if(!empty($profile->person->plan))
                    <div id="plan-controls">
                    <div class="col-md-3">
                        <br>
                        <a href="{{asset($profile->person->plan)}}" target="_blank"><button type="button" class="btn btn-primary">Descargar</button></a>
                    </div>
                    <div class="col-md-3">
                        <br>
                      <button type="button" class="btn btn-danger" id="deletePlan">Borrar</button>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="observatory">Observatorio</label>
                  <input type="text" class="form-control" name="observatory" value="{{$profile->person->observatory}}" placeholder="Ingrese el url del Observatorio" >
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Datos Row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Timeline</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Destacado</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody id="timeline-grid">
                  @foreach($profile->person->timelines as $i => $timeline)
                  <tr class="">
                    <input type="hidden" name="timeline[{{$i}}][id]" value="{{$timeline->id}}"/>
                    <td class="startDate"><label>{{$timeline->start}}</label><input type="hidden" name="timeline[{{$i}}][startDate]" value="{{$timeline->start}}"/></td>
                    <td class="endDate"><label>{{$timeline->end}}</label><input type="hidden" name="timeline[{{$i}}][endDate]" value="{{$timeline->end}}"/></td>
                    <td class="title"><label>{{$timeline->shortDescription}}</label><input type="hidden" name="timeline[{{$i}}][title]" value="{{$timeline->shortDescription}}"/></td>
                    <td class="type"><label>{{getTypeEvent($timeline->typeEvent)}}</label><input type="hidden" name="timeline[{{$i}}][type]" value="{{$timeline->typeEvent}}"/></td>
                    <td class="description"><label>{{$timeline->description}}</label><input type="hidden" name="timeline[{{$i}}][description]" value="{{$timeline->description}}"/></td>
                    <td class="outstanding"><label>{{getBooleanString($timeline->important)}}</label><input type="hidden" name="timeline[{{$i}}][outstanding]" value="{{$timeline->important}}"/></td>
                    <td class="action"><button type="button" class="btn btn-danger btn-delete">Eliminar</button></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfooter>
                  <tr class="model-timeline hidden">
                    <input type="hidden" name="id-model" value="-1"/>
                    <td class="startDate"><label></label><input type="hidden" name="startDate-model" value="-1"/></td>
                    <td class="endDate"><label></label><input type="hidden" name="endDate-model" value="-1"/></td>
                    <td class="title"><label></label><input type="hidden" name="title-model" value="-1"/></td>
                    <td class="type"><label></label><input type="hidden" name="type-model" value="-1"/></td>
                    <td class="description"><label></label><input type="hidden" name="description-model" value="-1"/></td>
                    <td class="outstanding"><label></label><input type="hidden" name="outstanding-model" value="-1"/></td>
                    <td class="action"><button type="button" class="btn btn-danger btn-delete">Eliminar</button></td>
                  </tr>
                </tfooter>
              </table>
            </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="date">Fecha inicio</label>
                  <input type="date" class="form-control" name="startDate-timeline" id="startDate">
                </div>
                <div class="col-md-6">
                  <label for="name">Fecha fin</label>
                  <input type="date" class="form-control" name="endDate-timeline" id="endDate">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="email">Título</label>
                  <input type="text" class="form-control" name="title-timeline" id="title" placeholder="Ingrese el título">
                </div>
                <div class="col-md-6">
                  <label for="name">Tipo</label>
                  <select id="type" name="type-timeline" class="form-control">
                    <option value="1">Pública</option>
                    <option value="2">Privada</option>
                    <option value="3">Política</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="email">Descripción</label>
                <textarea id="description" class="textarea" name="description-timeline" placeholder="Escriba la descripción aquí" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="outstanding">Es Destacado</label>
                  <input type="checkbox" name="outstanding" id="outstanding-check">
                </div>
              </div>
          </div>
          <div class="box-footer">
            <button id="add-to-timeline" type="button" class="btn btn-success">Agregar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Datos Row -->
    <!-- Datos Row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Transparencia</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <!-- ROW -->
            <div class="row">
              <div class="col-md-12">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">SRI</h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                      <label>Inpuesto a la Renta</label>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Año</th>
                              <th>Inpuesto</th>
                              <th>Acción</th>
                            </tr>
                          </thead>
                          <tbody id="sri-impuesto-grid">
                            @foreach($profile->sri()->where('taxType',1)->get() as $i => $rentTax)
                            <tr class="">
                              <input type="hidden" name="sri[{{$i}}][id]" value="{{$rentTax->id}}"/>
                              <input type="hidden" name="sri[{{$i}}][type]" value="{{$rentTax->type}}"/>
                              <td class="year"><label>{{$rentTax->year}}</label><input type="hidden" name="sri[{{$i}}][year]" value="{{$rentTax->year}}"/></td>
                              <td class="tax"><label>{{$rentTax->value}}</label><input type="hidden" name="sri[{{$i}}][tax]" value="{{$rentTax->value}}"/></td>

                              <td class="action"><button type="button" class="btn btn-danger btn-delete">Eliminar</button></td>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfooter>
                            <tr class="model-sri-taxes hidden">
                              <input type="hidden" name="id-model" value="-1"/>
                              <input type="hidden" name="type-model" value="-1"/>
                              <td class="year"><label></label><input type="hidden" name="year-model" value="-1"/></td>
                              <td class="tax"><label></label><input type="hidden" name="tax-model" value="-1"/></td>
                              <td class="action"><button type="button" class="btn btn-danger btn-delete">Eliminar</button></td>
                            </tr>
                          </tfooter>
                        </table>
                      </div>
                      </div>
                      <!-- End col --->
                      <div class="col-md-6">
                      <label>Inpuesto a la Salida Divisas</label>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Año</th>
                              <th>Inpuesto</th>
                              <th>Acción</th>
                            </tr>
                          </thead>
                          <tbody id="sri-divisas-grid">
                            @foreach($profile->sri()->where('taxType',2)->get() as $i => $rentTax)
                            <tr class="">
                              <input type="hidden" name="sri[{{6 + $i}}][id]" value="{{$rentTax->id}}"/>
                              <input type="hidden" name="sri[{{6 + $i}}][type]" value="{{$rentTax->type}}"/>
                              <td class="year"><label>{{$rentTax->year}}</label><input type="hidden" name="sri[{{6 + $i}}][year]" value="{{$rentTax->year}}"/></td>
                              <td class="tax"><label>{{$rentTax->value}}</label><input type="hidden" name="sri[{{6 + $i}}][tax]" value="{{$rentTax->value}}"/></td>

                              <td class="action"><button type="button" class="btn btn-danger btn-delete">Eliminar</button></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      </div>
                    </div>
                    <!-- End col --->
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Tipo</label>
                        <select id="taxType" class="form-control">
                          <option value="1">Renta</option>
                          <option value="2">Salida Divisas</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label>Año</label>
                        <select id="taxYear" class="form-control">
                          @foreach($years as $year)
                            <option value="{{$year}}">{{$year}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Valor</label>
                      <input id="taxValue" type="text" name="tax-value" class="form-control" placeholder="Inpuesto">
                    </div>
                    <div class="box-footer">
                      <button id="add-to-sri" type="button" class="btn btn-success">Agregar</button>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="fuente">Url Fuente</label>
                        <input type="text" class="form-control" name="urlFuenteSRI"  placeholder="Ingrese el link" value="{{$profile->urlSri}}" />
                      </div>
                      <div class="col-md-2">
                        <label for="curriculum">Archivo Fuente</label>
                        <input type="file" class="form-control" name="fileFuenteSRI"  placeholder="Archivo fuente">
                        <input type="hidden" name="fileSRIDelete" id="fileSRIDelete" value="false">
                      </div>
                      @if(!empty($profile->fileSri))
                        <div id="sri-controls">
                          <div class="col-md-2">
                              <br>
                            <a href="{{asset($profile->fileSri)}}" target="_blank"><button type="button" class="btn btn-primary">Descargar</button></a>
                          </div>
                          <div class="col-md-2">
                              <br>
                            <button type="button" class="btn btn-danger" id="deleteFileSri">Borrar</button>
                          </div>
                        </div>
                      @endif
                  </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- END ROW -->

            <!-- ROW -->
            <div class="row">
              <div class="col-md-12">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Declaración patrimonial</h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group row">
                      <div class="col-md-3">
                        <label># Casas</label>
                        <input type="number" name="houses" class="form-control" value="{{(isset($profile->heritage) ? $profile->heritage->houses : 0)}}" placeholder="Casas">
                      </div>
                      <div class="col-md-3">
                        <label># Carros</label>
                        <input type="number" name="cars" class="form-control" value="{{(isset($profile->heritage) ? $profile->heritage->cars : 0)}}" placeholder="Carros">
                      </div>
                      <div class="col-md-3">
                        <label>$ Dinero</label>
                        <input type="number" name="money" class="form-control" value="{{(isset($profile->heritage) ? $profile->heritage->money : 0)}}" placeholder="Dinero">
                      </div>
                      <div class="col-md-3">
                        <label># Compañias</label>
                        <input type="number" name="companies" class="form-control" value="{{(isset($profile->heritage) ? $profile->heritage->companies : 0)}}" placeholder="Compañias">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Declaración actual</label>

                      </div>
                      <div class="col-md-6">
                        <label>Declaración previa</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="date">Fecha actual</label>
                        <input type="date" class="form-control" name="actualDeclaration" id="actualDeclarationDate">
                      </div>
                      <div class="col-md-6">
                        <label for="date">Fecha previa</label>
                        <input type="date" class="form-control" name="previousDeclaration" id="previousDeclarationDate">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Activos Actuales</label>
                        <input type="text" name="actualAssets" value="{{(isset($profile->heritage) ? $profile->heritage->actualAssets : 0)}}" class="form-control" placeholder="Valor">
                      </div>
                      <div class="col-md-6">
                        <label>Activos Previos</label>
                        <input type="text" name="previousAssets" value="{{(isset($profile->heritage) ? $profile->heritage->previousAssets : 0)}}" class="form-control" placeholder="Valor">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Pasivos Actuales</label>
                        <input type="text" name=actualLiabilities value="{{(isset($profile->heritage) ? $profile->heritage->actualLiabilities : 0)}}" class="form-control" placeholder="Valor">
                      </div>
                      <div class="col-md-6">
                        <label>Pasivos Previos</label>
                        <input type="text" name="previousLiabilities" value="{{(isset($profile->heritage) ? $profile->heritage->previousLiabilities : 0)}}" class="form-control" placeholder="Valor">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Patromonio Actual</label>
                        <input type="text" name="actualHeritage" value="{{(isset($profile->heritage) ? $profile->heritage->actualHeritage : 0)}}" class="form-control" placeholder="Valor">
                      </div>
                      <div class="col-md-6">
                        <label>Patromonio Previos</label>
                        <input type="text" name="previousHeritage" value="{{(isset($profile->heritage) ? $profile->heritage->previousHeritage : 0)}}" class="form-control" placeholder="Valor">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="fuente">Url Fuente</label>
                        <input type="text" class="form-control" name="urlFuentePatrimonio" value="{{$profile->urlHeritage}}"  placeholder="Ingrese el link">
                      </div>
                      <div class="col-md-2">
                        <label for="curriculum">Archivo Fuente</label>
                        <input type="file" class="form-control" name="fileFuentePatrimonio"  placeholder="Archivo fuente">
                        <input type="hidden" name="fileFuentePatrimonioDelete" id="fileFuentePatrimonioDelete" value="false">
                      </div>
                      @if(!empty($profile->fileHeritage))
                        <div id="heritage-controls">
                          <div class="col-md-2">
                              <br>
                            <a href="{{asset($profile->fileHeritage)}}" target="_blank"><button type="button" class="btn btn-primary">Descargar</button></a>
                          </div>
                          <div class="col-md-2">
                              <br>
                            <button type="button" class="btn btn-danger" id="deleteFileFuentePatrimonio">Borrar</button>
                          </div>
                        </div>
                      @endif
                  </div>
                </div>
                <!-- END BOX -->
              </div>
            </div>
              </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="row">
              <div class="col-md-12">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Superintendencia</h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Posición</th>
                            <th># Companias</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody id="position-grid">
                          @foreach($profile->companies as $i => $company)
                          <tr class="">
                            <input type="hidden" name="company[{{$i}}][id]" value="{{$company->id}}"/>
                            <td class="position"><label>{{getCompanyPosition($company->position)}}</label><input type="hidden" name="company[{{$i}}][position]" value="{{$company->position}}"/></td>
                            <td class="total_companies"><label>{{$company->total_companies}}</label><input type="hidden" name="company[{{$i}}][total_companies]" value="{{$company->total_companies}}"/></td>
                            <td class="action"><button type="button" class="btn btn-danger btn-delete-company">Eliminar</button></td>
                          </tr>
                          @endforeach
                        </tbody>
                        <tfooter>
                          <tr class="model-companies hidden">
                            <input type="hidden" name="id-model" value="-1"/>
                            <td class="position"><label></label><input type="hidden" name="position-model" value="-1"/></td>
                            <td class="total_companies"><label></label><input type="hidden" name="total_companies-model" value="-1"/></td>
                            <td class="action"><button type="button" class="btn btn-danger btn-delete-company">Eliminar</button></td>
                          </tr>
                        </tfooter>
                      </table>
                    </div>
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="name">Posición</label>
                          <select id="position" name="type-timeline" class="form-control">
                            @if(!containsPosition(1,$profile->companies))
                            <option value="1">Presidente</option>
                            @endif
                            @if(!containsPosition(2,$profile->companies))
                            <option value="2">Gerente</option>
                            @endif
                            @if(!containsPosition(3,$profile->companies))
                            <option value="3">Accionista</option>
                            @endif
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="name"># Companias</label>
                          <input type="number" class="form-control" name="endDate-timeline" id="total_companies">
                        </div>
                      </div>

                  <div class="box-footer">
                    <button id="add-to-companies" type="button" class="btn btn-success">Agregar</button>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="fuente">Url Fuente</label>
                      <input type="text" class="form-control" name="urlFuenteCompanies" value="{{$profile->urlCompanies}}"  placeholder="Ingrese el link">
                    </div>
                    <div class="col-md-2">
                      <label for="curriculum">Archivo Fuente</label>
                      <input type="file" class="form-control" name="fileCompanies"  placeholder="Archivo fuente">
                      <input type="hidden" name="fileCompaniesDelete" id="fileCompaniesDelete" value="false">
                    </div>
                    @if(!empty($profile->fileCompanies))
                      <div id="companies-controls">
                        <div class="col-md-2">
                            <br>
                          <a href="{{asset($profile->fileCompanies)}}" target="_blank"><button type="button" class="btn btn-primary">Descargar</button></a>
                        </div>
                        <div class="col-md-2">
                            <br>
                          <button type="button" class="btn btn-danger" id="deleteFileCompanies">Borrar</button>
                        </div>
                      </div>
                    @endif
                </div>
                </div>
                </div>
              </div>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="row">
              <div class="col-md-12">
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">Antecedentes</h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="row-fluid">
                      <h4>Penales</h4>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-3">
                        <label>Si</label> <br>
                        @if($profile->hasPenals)
                          <input type="checkbox" name="hasPenals"  checked/>
                        @else
                          <input type="checkbox" name="hasPenals" />
                        @endif

                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="fuente">Url Fuente</label>
                        <input type="text" class="form-control" name="urlFuentesPenales"  placeholder="Ingrese el link">
                      </div>
                      <div class="col-md-2">
                        <label for="curriculum">Archivo Fuente</label>
                        <input type="file" class="form-control" name="fileFuentePenal"  placeholder="Archivo fuente">
                        <input type="hidden" name="fileFuentePenalDelete" id="fileFuentePenalDelete" value="false">
                      </div>
                      @if(!empty($profile->filePenal))
                        <div id="penal-controls">
                          <div class="col-md-2">
                              <br>
                            <a href="{{asset($profile->filePenal)}}" target="_blank"><button type="button" class="btn btn-primary">Descargar</button></a>
                          </div>
                          <div class="col-md-2">
                              <br>
                            <button type="button" class="btn btn-danger" id="deleteFilePenal">Borrar</button>
                          </div>
                        </div>
                      @endif
                  </div>
                    <div class="row-fluid">
                      <h4>Judiciales</h4>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      <label>Actor</label>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Tipo</th>
                              <th>Número</th>
                              <th>Acción</th>
                            </tr>
                          </thead>
                          <tbody id="actor-grid">
                            @foreach($profile->judicials()->where('type',1)->get() as $i => $judicial)
                            <tr class="">
                              <input type="hidden" name="judicialActor[{{$i}}][id]" value="{{$judicial->id}}"/>
                              <input type="hidden" name="judicialActor[{{$i}}][type]" value="{{$judicial->type}}"/>
                              <td class="typeJudicial"><label>{{$judicial->judgmentType->name}}</label><input type="hidden" name="judijudicialActorcial[{{$i}}][judgment_type_id]" value="{{$judicial->judgment_type_id}}"/></td>
                              <td class="number"><label>{{$judicial->number}}</label><input type="hidden" name="judicialActor[{{$i}}][number]" value="{{$judicial->number}}"/></td>

                              <td class="action"><button type="button" class="btn btn-danger btn-delete">Eliminar</button></td>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfooter>
                            <tr class="model-actor hidden">
                              <input type="hidden" name="id-model" value="-1"/>
                              <input type="hidden" name="type-model" value="-1"/>
                              <td class="typeJudicial"><label></label><input type="hidden" name="type-jud-model" value="-1"/></td>
                              <td class="number"><label></label><input type="hidden" name="number-model" value="-1"/></td>
                              <td class="action"><button type="button" class="btn btn-danger btn-delete">Eliminar</button></td>
                            </tr>
                          </tfooter>
                        </table>
                      </div>
                      </div>
                      <!-- End col --->
                      <div class="col-md-6">
                      <label>Demandado</label>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Tipo</th>
                              <th>Número</th>
                              <th>Acción</th>
                            </tr>
                          </thead>
                          <tbody id="demandado-grid">
                            @foreach($profile->judicials()->where('type',2)->get()  as $i => $judicial)
                            <tr class="">
                              <input type="hidden" name="judicialDemand[{{$i}}][id]" value="{{$judicial->id}}"/>
                              <input type="hidden" name="judicialDemand[{{$i}}][type]" value="{{$judicial->type}}"/>
                              <td class="typeJudicial"><label>{{$judicial->judgmentType->name}}</label><input type="hidden" name="judicialDemand[{{$i}}][judgment_type_id]" value="{{$judicial->judgment_type_id}}"/></td>
                              <td class="number"><label>{{$judicial->number}}</label><input type="hidden" name="judicialDemand[{{$i}}][number]" value="{{$judicial->number}}"/></td>

                              <td class="action"><button type="button" class="btn btn-danger btn-delete">Eliminar</button></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      </div>
                    </div>
                    <!-- End col --->
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Es</label>
                        <select id="judgment" class="form-control">
                          <option value="1">Actor</option>
                          <option value="2">Demandado</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label>Tipo</label>
                        <select id="judgment_type_id" class="form-control">
                          @foreach($judgment_types as $judgment_type)
                            <option value="{{$judgment_type->id}}">{{$judgment_type->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Número de casos</label>
                      <input id="number" type="text" name="tax-value" class="form-control" placeholder="number">

                  </div>
                  <div class="box-footer">
                    <button id="add-to-judgment" type="button" class="btn btn-success">Agregar</button>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="fuente">Url Fuente</label>
                      <input type="text" class="form-control" name="urlFuenteJudicials"  placeholder="Ingrese el link">
                    </div>
                    <div class="col-md-2">
                      <label for="curriculum">Archivo Fuente</label>
                      <input type="file" class="form-control" name="fileFuenteJudicials"  placeholder="Archivo fuente">
                      <input type="hidden" name="fileFuenteJudicialsDelete" id="fileFuenteJudicialsDelete" value="false">
                    </div>
                    @if(!empty($profile->fileJudicial))
                      <div id="judicial-controls">
                        <div class="col-md-2">
                            <br>
                          <a href="{{asset($profile->fileJudicial)}}" target="_blank"><button type="button" class="btn btn-primary">Descargar</button></a>
                        </div>
                        <div class="col-md-2">
                            <br>
                          <button type="button" class="btn btn-danger" id="deleteFileJudial">Borrar</button>
                        </div>
                      </div>
                    @endif
                </div>
                </div>
                </div>
              </div>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="row">
              <div class="col-md-12">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Senecyt</h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="box-body">

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label>Profesión</label>
                        <input type="text" name="profession" class="form-control" value="{{(isset($profile->study)) ? $profile->study->profession : ''}}" placeholder="Ingrese el título universitario">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label># Pregrado</label>
                        <input type="number" name="pregrade" class="form-control" value="{{(isset($profile->study) ? $profile->study->pregrade : 0)}}" placeholder="Pregrado">
                      </div>
                      <div class="col-md-4">
                        <label># Posgrado</label>
                        <input type="number" name="posgrade" class="form-control" value="{{(isset($profile->study) ? $profile->study->postgrad : 0)}}" placeholder="Postgrado">
                      </div>
                      <div class="col-md-4">
                        <label># Phd</label>
                        <input type="number" name="phd" class="form-control" value="{{(isset($profile->study) ? $profile->study->phd : 0)}}" placeholder="PHD">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="fuente">Url Fuente</label>
                        <input type="text" class="form-control" name="urlFuenteSenecyt" value="{{$profile->urlStudy}}"  placeholder="Ingrese el link">
                      </div>
                      <div class="col-md-2">
                        <label for="curriculum">Archivo Fuente</label>
                        <input type="file" class="form-control" name="fileStudy"  placeholder="Archivo fuente">
                        <input type="hidden" name="fileStudyDelete" id="fileStudyDelete" value="false">
                      </div>
                      @if(!empty($profile->fileStudy))
                        <div id="study-controls">
                          <div class="col-md-2">
                              <br>
                            <a href="{{asset($profile->fileStudy)}}" target="_blank"><button type="button" class="btn btn-primary">Descargar</button></a>
                          </div>
                          <div class="col-md-2">
                              <br>
                            <button type="button" class="btn btn-danger" id="deleteFileStudy">Borrar</button>
                          </div>
                        </div>
                      @endif
                  </div>
                  </div>
                  <div class="box-body">
                    <div class="form-horizontal">
                    </div>


                  </div>
                </div>
              </div>
            </div>
            <!-- END ROW -->
            <!-- ROW -->
            <div class="row">
              <div class="col-md-12">
                <div class="box box-warning">
                  <div class="box-header with-border">
                    <h3 class="box-title">Contraloría</h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label>Número de Procesos</label>
                        <input type="number" name="comptrollerProcess" value="{{(isset($profile->comptroller) ? $profile->comptroller->processes : 0)}}" class="form-control" value="{{(isset($profile->person->heritage) ? $profile->person->heritage->houses : 0)}}" placeholder="0">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="fuente">Url Fuente</label>
                        <input type="text" class="form-control" name="urlFuenteComptroller" value="{{$profile->urlComptroller}}"  placeholder="Ingrese el link">
                      </div>
                      <div class="col-md-2">
                        <label for="curriculum">Archivo Fuente</label>
                        <input type="file" class="form-control" name="fileComptroller"  placeholder="Archivo fuente">
                        <input type="hidden" name="fileComptrollerDelete" id="fileComptrollerDelete" value="false">
                      </div>
                      @if(!empty($profile->fileComptroller))
                        <div id="comptroller-controls">
                          <div class="col-md-2">
                              <br>
                            <a href="{{asset($profile->fileComptroller)}}" target="_blank"><button type="button" class="btn btn-primary">Descargar</button></a>
                          </div>
                          <div class="col-md-2">
                              <br>
                            <button type="button" class="btn btn-danger" id="deleteFileComptroller">Borrar</button>
                          </div>
                        </div>
                      @endif
                  </div>
                  </div>
                  <div class="box-body">
                    <div class="form-horizontal">
                    </div>


                  </div>
                </div>
              </div>
            </div>
            <!-- END ROW -->


          </div>
        </div>
      </div>
    </div>
    <!-- Datos Row -->
  </form>
  <!-- /.row -->
</section>
@endsection

@section('scripts')
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

<script>
  $('#deleteCurriculum').click(function(){
      $('#curriculum-controls').addClass('hidden');
      $('#curriculumDelete').val(true);
  });

  $('#deletePlan').click(function(){
      $('#plan-controls').addClass('hidden');
      $('#gobermentPlanDelete').val(true);
  });
</script>

<script>
  $('#deleteFileSri').click(function(){
      $('#sri-controls').addClass('hidden');
      $('#fileSRIDelete').val(true);
  });

  $('#deleteFileFuentePatrimonio').click(function(){
      $('#heritage-controls').addClass('hidden');
      $('#fileFuentePatrimonioDelete').val(true);
  });

  $('#deleteFileCompanies').click(function(){
      $('#companies-controls').addClass('hidden');
      $('#fileCompaniesDelete').val(true);
  });

  $('#deleteFilePenal').click(function(){
      $('#penal-controls').addClass('hidden');
      $('#fileFuentePenalDelete').val(true);
  });

  $('#deleteFileJudial').click(function(){
      $('#judicial-controls').addClass('hidden');
      $('#fileFuenteJudicialsDelete').val(true);
  });

  $('#deleteFileStudy').click(function(){
      $('#study-controls').addClass('hidden');
      $('#fileStudyDelete').val(true);
  });

  $('#deleteFileComptroller').click(function(){
      $('#comptroller-controls').addClass('hidden');
      $('#fileComptrollerDelete').val(true);
  });
</script>

<script>


  var $CONTAINER = $('#timeline-grid');

  $('#add-to-timeline').click(function () {
    console.log("Click");
    var index = $('#timeline-grid').find('tr').length;
    var $clone = $('.model-timeline').clone(true).removeClass('hidden model-timeline');
    $clone.find('input').attr('name' , 'timeline['+index+'][id]');
    $clone.find('.startDate').find('input').attr('name' , 'timeline['+index+'][startDate]');
    $clone.find('.startDate').find('input').val($('#startDate').val());
    $clone.find('.startDate').find('label').text($('#startDate').val());

    $clone.find('.endDate').find('input').attr('name' , 'timeline['+index+'][endDate]');
    $clone.find('.endDate').find('input').val($('#endDate').val());
    $clone.find('.endDate').find('label').text($('#endDate').val());

    $clone.find('.title').find('input').attr('name' , 'timeline['+index+'][title]');
    $clone.find('.title').find('input').val($('#title').val());
    $clone.find('.title').find('label').text($('#title').val());

    $clone.find('.type').find('input').attr('name' , 'timeline['+index+'][type]');
    $clone.find('.type').find('input').val($('#type').val());
    $clone.find('.type').find('label').text($('#type option:selected').text());

    $clone.find('.description').find('input').attr('name' , 'timeline['+index+'][description]');
    $clone.find('.description').find('input').val($('#description').val());
    $clone.find('.description').find('label').text($('#description').val());

    $clone.find('.outstanding').find('input').attr('name' , 'timeline['+index+'][outstanding]');

    if ($('#outstanding-check:checked').length > 0)
    {
      $clone.find('.outstanding').find('input').val(1);
      $clone.find('.outstanding').find('label').text("Sí");
    }else {
      $clone.find('.outstanding').find('input').val(0);
      $clone.find('.outstanding').find('label').text("No");
    }


    $CONTAINER.append($clone);


    sortInputsTimeline();

  });

  $('.btn-delete').click(function(){
    var $this = $(this);
    var divToDelete = $($this.context.parentElement.parentElement);
    divToDelete.remove();

    sortInputsTimeline();
  });

  function sortInputsTimeline()
  {
    var childrens = $CONTAINER.find('tr').clone(true);
    var dates =[];
    for (var i=0; i<childrens.length;i++)
    {
      var child=$(childrens[i]);
        dates.push( child.find('.startDate').find('label').text());
    }
    dates.sort();
    $CONTAINER.find('tr').remove();
    var childrensSorted = [];
    for (var i=0; i<dates.length;i++)
    {
      childrensSorted.push(extract(dates[i],childrens));
    }

    for (var i = 0; i < childrensSorted.length; i++) {
      var $clone = $(childrensSorted[i]).clone(true);
      $clone.find('input').attr('name' , 'timeline['+i+'][id]');
      $clone.find('.startDate').find('input').attr('name' , 'timeline['+i+'][startDate]');
      $clone.find('.endDate').find('input').attr('name' , 'timeline['+i+'][endDate]');
      $clone.find('.title').find('input').attr('name' , 'timeline['+i+'][title]');
      $clone.find('.type').find('input').attr('name' , 'timeline['+i+'][type]');
      $clone.find('.description').find('input').attr('name' , 'timeline['+i+'][description]');
      $clone.find('.outstanding').find('input').attr('name' , 'timeline['+i+'][outstanding]');
      $CONTAINER.append($clone);
    }
  }

  function extract(date,array)
  {
    for (var i = 0; i < array.length; i++) {
      var child=$(array[i]);
      if(child.find('.startDate').find('label').text() === date)
      {
        return array.splice(i, 1)[0];
      }
    }
  }

  sortInputsTimeline();
</script>


<script>

  var $SRIIMPUESTOSCONTAINER = $('#sri-impuesto-grid');
  var $SRIDIVISASCONTAINER = $('#sri-divisas-grid');

  $('#taxType').change(function(){
    loadYears();
  });

  function generateLastYears()
  {
    //TODO: Generar los los años. Y refrescar en la opción de editar para que se vayan quitando los años.
  }

  function loadYears()
  {
    switch ($('#taxType').val()) {
      case "1":
        break;
      case "2":
        break;
      default:
        break;
    }
  }

  $('#add-to-sri').click(function(){
    var index = 0;
    switch ($('#taxType').val()) {
      case "1":
      index  = $SRIIMPUESTOSCONTAINER.find('tr').length;
        break;
      case "2":
      index = 6 + $SRIDIVISASCONTAINER.find('tr').length;
        break;
      default:
        break;
    }

    var clone = $('.model-sri-taxes').clone(true).removeClass('hidden model-sri-taxes');
    clone.find('input[name=id-model]').attr('name' , 'sri['+index+'][id]');
    clone.find('input[name=type-model]').val($('#taxType').val());
    clone.find('input[name=type-model]').attr('name' , 'sri['+index+'][type]');

    clone.find('.year').find('input').attr('name' , 'sri['+index+'][year]');
    clone.find('.year').find('input').val($('#taxYear').val());
    clone.find('.year').find('label').text($('#taxYear').val());

    clone.find('.tax').find('input').attr('name' , 'sri['+index+'][tax]');
    clone.find('.tax').find('input').val($('#taxValue').val());
    clone.find('.tax').find('label').text($('#taxValue').val());

    switch ($('#taxType').val()) {
      case "1":
        $SRIIMPUESTOSCONTAINER.append(clone);
        break;
      case "2":
        $SRIDIVISASCONTAINER.append(clone);
        break;
      default:
        break;
    }

  });


</script>
<script>

 var $CONTAINERGRD = $('#position-grid');

 $('#add-to-companies').click(function () {
   var index = $('#position-grid').find('tr').length;
   var $clone = $('.model-companies').clone(true).removeClass('hidden model-companies');
   if(($('#position')[0]).options.length > 0){
     $clone.find('input').attr('name' , 'company['+index+'][id]');
     $clone.find('.position').find('input').attr('name' , 'company['+index+'][position]');
     $clone.find('.position').find('input').val($('#position').val());
     $clone.find('.position').find('label').text($('#position option:selected').text());

     $clone.find('.total_companies').find('input').attr('name' , 'company['+index+'][total_companies]');
     $clone.find('.total_companies').find('input').val($('#total_companies').val());
     $clone.find('.total_companies').find('label').text($('#total_companies').val());

     $CONTAINERGRD.append($clone);
     $('#position option:selected').remove();
   }
 });

 $('.btn-delete-company').click(function(){
   var $this = $(this);
   var divToDelete = $($this.context.parentElement.parentElement);
   var newOption = $(document.createElement("option"));
   newOption.val(divToDelete.find('.position').find('input').val());
   newOption.text(divToDelete.find('.position').find('label').text());
   $('#position').append(newOption);

   divToDelete.remove();
 });

</script>

<script>

  var $ACTORCONTAINER = $('#actor-grid');
  var $DEMANDADOCONTAINER = $('#demandado-grid');


  $('#add-to-judgment').click(function(){
    console.log("escribe cualquie cosa");
    var index = 0;
    switch ($('#judgment').val()) {
      case "1":
      index  = $ACTORCONTAINER.find('tr').length;
      var clone = $('.model-actor').clone(true).removeClass('hidden model-actor');
      clone.find('input[name=id-model]').attr('name' , 'judicialActor['+index+'][id]');
      clone.find('input[name=type-model]').val($('#judgment').val());
      clone.find('input[name=type-model]').attr('name' , 'judicialActor['+index+'][type]');

      clone.find('.typeJudicial').find('input').attr('name' , 'judicialActor['+index+'][typeJudicial]');
      clone.find('.typeJudicial').find('input').val($('#judgment_type_id').val());
      clone.find('.typeJudicial').find('label').text($('#judgment_type_id option:selected').text());

      clone.find('.number').find('input').attr('name' , 'judicialActor['+index+'][number]');
      clone.find('.number').find('input').val($('#number').val());
      clone.find('.number').find('label').text($('#number').val());

      $ACTORCONTAINER.append(clone);
        break;
      case "2":
      index = $DEMANDADOCONTAINER.find('tr').length;

      var clone = $('.model-actor').clone(true).removeClass('hidden model-actor');
      clone.find('input[name=id-model]').attr('name' , 'judicialDemand['+index+'][id]');
        clone.find('input[name=type-model]').val($('#judgment').val());
      clone.find('input[name=type-model]').attr('name' , 'judicialDemand['+index+'][type]');

      clone.find('.typeJudicial').find('input').attr('name' , 'judicialDemand['+index+'][typeJudicial]');
      clone.find('.typeJudicial').find('input').val($('#judgment_type_id').val());
      clone.find('.typeJudicial').find('label').text($('#judgment_type_id option:selected').text());


      clone.find('.number').find('input').attr('name' , 'judicialDemand['+index+'][number]');
      clone.find('.number').find('input').val($('#number').val());
      clone.find('.number').find('label').text($('#number').val());

        $DEMANDADOCONTAINER.append(clone);
        break;
      default:
        break;
    }

  });


</script>




@endsection
