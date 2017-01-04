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
  <form action="{{URL::to(route('profile.update',$profile->id))}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <input name="_method" type="hidden" value="PUT">
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary pull-right">Guardar</button>
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
                  <img class="img-circle" data-src="{{ (isset($profile->picture)) ? $profile->picture : 'holder.js/150x150' }}" />
                  <input type="file" name="profile" placeholder="ingrese">
                </div>
                <div class="col-md-8">
                    <label>Foto Detalle</label><br>
                  <img class="img-thumbnail" data-src="{{ (isset($profile->person->img)) ? $profile->person->img : 'holder.js/200x150' }}" />
                  <input type="file" name="profile" placeholder="ingrese">
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
                    @foreach ($politicalParties as $politicalParty)
                    <option value="{{$politicalParty->id}}">{{$politicalParty->name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="email">Descripción</label>
                <textarea class="textarea" name="description" placeholder="Escriba la descripción aquí" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="name">Facebook</label>
                  <input type="text" class="form-control" name="facebook" value="{{$profile->person->name}}" id="name" placeholder="Ingrese el nombre">
                </div>
                <div class="col-md-6">
                  <label for="email">Twitter</label>
                  <input type="text" class="form-control" name="twitter"value="{{$profile->person->lastname}}"  id="lastname" placeholder="Ingrese el apellido">
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
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody id="timeline-grid">
                  @foreach($profile->person->timelines as $i => $timeline)
                  <tr class="">
                    <input type="hidden" name="timeline[{{$i}}]['id']" value="{{$timeline->id}}"/>
                    <td class="startDate"><label>{{$timeline->start}}</label><input type="hidden" name="timeline[{{$i}}]['startDate']" value="{{$timeline->start}}"/></td>
                    <td class="endDate"><label>{{$timeline->end}}</label><input type="hidden" name="timeline[{{$i}}]['endDate']" value="{{$timeline->end}}"/></td>
                    <td class="title"><label>{{$timeline->shortDescription}}</label><input type="hidden" name="timeline[{{$i}}]['title']" value="{{$timeline->shortDescription}}"/></td>
                    <td class="type"><label>{{$timeline->typeEvent}}</label><input type="hidden" name="timeline[{{$i}}]['type']" value="{{$timeline->typeEvent}}"/></td>
                    <td class="description"><label>{{$timeline->description}}</label><input type="hidden" name="timeline[{{$i}}]['description']" value="{{$timeline->description}}"/></td>
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
                            @foreach([] as $i => $rentTax)
                            <tr class="">
                              <input type="hidden" name="rentTax[{{$i}}]['id']" value="{{$rentTax->id}}"/>
                              <input type="hidden" name="rentTax[{{$i}}]['type']" value="{{$rentTax->type}}"/>
                              <td class="year"><label>{{$rentTax->year}}</label><input type="hidden" name="timeline[{{$i}}]['year']" value="{{$rentTax->year}}"/></td>
                              <td class="tax"><label>{{$rentTax->value}}</label><input type="hidden" name="timeline[{{$i}}]['tax']" value="{{$rentTax->value}}"/></td>

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
                            @foreach([] as $i => $rentTax)
                            <tr class="">
                              <input type="hidden" name="rentTax[{{$i}}]['id']" value="{{$rentTax->id}}"/>
                              <input type="hidden" name="rentTax[{{$i}}]['type']" value="{{$rentTax->type}}"/>
                              <td class="year"><label>{{$rentTax->year}}</label><input type="hidden" name="timeline[{{$i}}]['year']" value="{{$rentTax->year}}"/></td>
                              <td class="tax"><label>{{$rentTax->value}}</label><input type="hidden" name="timeline[{{$i}}]['tax']" value="{{$rentTax->value}}"/></td>

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
                  </div>
                  <div class="box-footer">
                    <button id="add-to-sri" type="button" class="btn btn-success">Agregar</button>
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
                        <input type="number" name="houses" class="form-control" value="{{(isset($profile->person->heritage) ? $profile->person->heritage->houses : 0)}}" placeholder="Casas">
                      </div>
                      <div class="col-md-3">
                        <label># Carros</label>
                        <input type="number" name="cars" class="form-control" value="{{(isset($profile->person->heritage) ? $profile->person->heritage->cars : 0)}}" placeholder="Carros">
                      </div>
                      <div class="col-md-3">
                        <label>$ Dinero</label>
                        <input type="number" name="money" class="form-control" value="{{(isset($profile->person->heritage) ? $profile->person->heritage->money : 0)}}" placeholder="Dinero">
                      </div>
                      <div class="col-md-3">
                        <label># Compañias</label>
                        <input type="number" name="companies" class="form-control" value="{{(isset($profile->person->heritage) ? $profile->person->heritage->companies : 0)}}" placeholder="Compañias">
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
                        <input type="date" class="form-control" name="actualDate-declaration" id="actualDeclarationDate">
                      </div>
                      <div class="col-md-6">
                        <label for="date">Fecha previa</label>
                        <input type="date" class="form-control" name="actualDate-declaration" id="previousDeclarationDate">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Activos Actuales</label>
                        <input type="text" name="tax-value" class="form-control" placeholder="Valor">
                      </div>
                      <div class="col-md-6">
                        <label>Activos Previos</label>
                        <input type="text" name="tax-value" class="form-control" placeholder="Valor">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Pasivos Actuales</label>
                        <input type="text" name="tax-value" class="form-control" placeholder="Valor">
                      </div>
                      <div class="col-md-6">
                        <label>Pasivos Previos</label>
                        <input type="text" name="tax-value" class="form-control" placeholder="Valor">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Patromonio Actual</label>
                        <input type="text" name="tax-value" class="form-control" placeholder="Valor">
                      </div>
                      <div class="col-md-6">
                        <label>Patromonio Previos</label>
                        <input type="text" name="tax-value" class="form-control" placeholder="Valor">
                      </div>
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
                            <input type="hidden" name="company[{{$i}}]['id']" value="{{$company->id}}"/>
                            <td class="position"><label>{{$company->position}}</label><input type="hidden" name="company[{{$i}}]['position']" value="{{$company->position}}"/></td>
                            <td class="total_companies"><label>{{$company->total_companies}}</label><input type="hidden" name="company[{{$i}}]['total_companies']" value="{{$company->total_companies}}"/></td>
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
                  </div>
                  <div class="box-footer">
                    <button id="add-to-companies" type="button" class="btn btn-success">Agregar</button>
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
                        <label>Si</label> <br><input type="checkbox" name="hasPenals" />
                      </div>
                        <div class="col-md-9">
                          <label>Cantidad</label>
                          <input type="number" class="form-control" name="penalsNumber" disabled/>
                        </div>
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
                            @foreach([] as $i => $rentTax)
                            <tr class="">
                              <input type="hidden" name="rentTax[{{$i}}]['id']" value="{{$rentTax->id}}"/>
                              <input type="hidden" name="rentTax[{{$i}}]['type']" value="{{$rentTax->type}}"/>
                              <td class="year"><label>{{$rentTax->year}}</label><input type="hidden" name="timeline[{{$i}}]['year']" value="{{$rentTax->year}}"/></td>
                              <td class="tax"><label>{{$rentTax->value}}</label><input type="hidden" name="timeline[{{$i}}]['tax']" value="{{$rentTax->value}}"/></td>

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
                            @foreach([] as $i => $rentTax)
                            <tr class="">
                              <input type="hidden" name="rentTax[{{$i}}]['id']" value="{{$rentTax->id}}"/>
                              <input type="hidden" name="rentTax[{{$i}}]['type']" value="{{$rentTax->type}}"/>
                              <td class="year"><label>{{$rentTax->year}}</label><input type="hidden" name="timeline[{{$i}}]['year']" value="{{$rentTax->year}}"/></td>
                              <td class="tax"><label>{{$rentTax->value}}</label><input type="hidden" name="timeline[{{$i}}]['tax']" value="{{$rentTax->value}}"/></td>

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
                        <select id="jugmentType" class="form-control">
                          @foreach($judgment_types as $judgment_type)
                            <option value="{{$judgment_type->id}}">{{$judgment_type->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Número de casos</label>
                      <input id="jugdmentCount" type="text" name="tax-value" class="form-control" placeholder="Inpuesto">
                    </div>
                  </div>
                  <div class="box-footer">
                    <button id="add-to-judgment" type="button" class="btn btn-success">Agregar</button>
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
                        <input type="text" name="tax-value" class="form-control" placeholder="Ingrese el título universitario">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label># Pregrado</label>
                        <input type="number" name="pregrade" class="form-control" value="{{(isset($profile->person->heritage) ? $profile->person->heritage->houses : 0)}}" placeholder="Casas">
                      </div>
                      <div class="col-md-4">
                        <label># Posgrado</label>
                        <input type="number" name="posgrade" class="form-control" value="{{(isset($profile->person->heritage) ? $profile->person->heritage->cars : 0)}}" placeholder="Carros">
                      </div>
                      <div class="col-md-4">
                        <label># Phd</label>
                        <input type="number" name="phd" class="form-control" value="{{(isset($profile->person->heritage) ? $profile->person->heritage->money : 0)}}" placeholder="Dinero">
                      </div>
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
                        <input type="number" name="pregrade" class="form-control" value="{{(isset($profile->person->heritage) ? $profile->person->heritage->houses : 0)}}" placeholder="0">
                      </div>
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


  var $CONTAINER = $('#timeline-grid');

  $('#add-to-timeline').click(function () {
    var index = $('#timeline-grid').find('tr').length;
    var $clone = $('.model-timeline').clone(true).removeClass('hidden model-timeline');
    $clone.find('input').attr('name' , 'timeline['+index+']["id"]');
    $clone.find('.startDate').find('input').attr('name' , 'timeline['+index+']["startDate"]');
    $clone.find('.startDate').find('input').val($('#startDate').val());
    $clone.find('.startDate').find('label').text($('#startDate').val());

    $clone.find('.endDate').find('input').attr('name' , 'timeline['+index+']["endDate"]');
    $clone.find('.endDate').find('input').val($('#endDate').val());
    $clone.find('.endDate').find('label').text($('#endDate').val());

    $clone.find('.title').find('input').attr('name' , 'timeline['+index+']["title"]');
    $clone.find('.title').find('input').val($('#title').val());
    $clone.find('.title').find('label').text($('#title').val());

    $clone.find('.type').find('input').attr('name' , 'timeline['+index+']["type"]');
    $clone.find('.type').find('input').val($('#type').val());
    $clone.find('.type').find('label').text($('#type option:selected').text());

    $clone.find('.description').find('input').attr('name' , 'timeline['+index+']["description"]');
    $clone.find('.description').find('input').val($('#type').val());
    $clone.find('.description').find('label').text($('#description').val());

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
      $clone.find('input').attr('name' , 'timeline['+i+']["id"]');
      $clone.find('.startDate').find('input').attr('name' , 'timeline['+i+']["startDate"]');
      $clone.find('.endDate').find('input').attr('name' , 'timeline['+i+']["endDate"]');
      $clone.find('.title').find('input').attr('name' , 'timeline['+i+']["title"]');
      $clone.find('.type').find('input').attr('name' , 'timeline['+i+']["type"]');
      $clone.find('.description').find('input').attr('name' , 'timeline['+i+']["description"]');
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
    clone.find('input[name=id-model]').attr('name' , 'sri['+index+']["id"]');
    clone.find('input[name=type-model]').attr('name' , 'sri['+index+']["type"]');
    clone.find('input[name=type-model]').val($('#taxType').val());

    clone.find('.year').find('input').attr('name' , 'sri['+index+']["year"]');
    clone.find('.year').find('input').val($('#taxYear').val());
    clone.find('.year').find('label').text($('#taxYear').val());

    clone.find('.tax').find('input').attr('name' , 'sri['+index+']["tax"]');
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

 var $CONTAINER = $('#position-grid');

 $('#add-to-companies').click(function () {
   var index = $('#position-grid').find('tr').length;
   var $clone = $('.model-companies').clone(true).removeClass('hidden model-companies');
   $clone.find('input').attr('name' , 'company['+index+']["id"]');
   $clone.find('.position').find('input').attr('name' , 'company['+index+']["position"]');
   $clone.find('.position').find('input').val($('#position').val());
   $clone.find('.position').find('label').text($('#position option:selected').text());

   $clone.find('.total_companies').find('input').attr('name' , 'company['+index+']["total_companies"]');
   $clone.find('.total_companies').find('input').val($('#total_companies').val());
   $clone.find('.total_companies').find('label').text($('#total_companies').val());

   $CONTAINER.append($clone);

   $('#position option:selected').remove();

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

@endsection
