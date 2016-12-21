@extends('layouts.app')

@section('content')
<div class="main-header">

</div>
<div class="container">
  <div class="row">
    <div class="col-md-12 right">
      <h3>ELECCIONES 2017</h3>
    </div>
  </div>
    <br>
  <br>
  <div class="row">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Candidatos Presidencia</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Candidatos Asamblea</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home" ng-controller="PresidentController">
        <div class="row">
          <!-- Init political card -->
          <div class="politics-card col-md-6" ng-repeat="binomial in binomails">
            <div class="row">
              <div class="col-md-8 col-lg-6">
                <div class="binomial">
                  <div class="president">
                    <img ng-src="{{asset('img').'/'}}<% binomial.president.picture %>" alt="<% binomial.president.name %>" class="img-circle" width="150px">
                    <a href="{{URL::to('/perfil/1')}}"><span>VER PERFIL</span></a>
                  </div>
                  <div class="vicepresident">
                    <img ng-src="{{asset('img').'/'}}<% binomial.vicepresident.picture %>" alt="<% binomial.vicepresident.name %>" class="img-circle" width="100px">
                    <a href="{{URL::to('/perfil/1')}}"><span>VER PERFIL</span></a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-lg-6" style="text-align: center;">
                  <div class="row">
                    <img src="{{asset('img/alianza-pais.jpg')}}" class="political-party-logo" >
                  </div>
                  <div class="row">
                    <label class="president-label"><% binomial.president.name + " " +  binomial.president.lastname %></label><br>
                    <label class="politic-position">Candidato Presidencia</label>
                  </div>
                  <div class="row">
                    <label class="vicepresident-label"><% binomial.vicepresident.name + " " +  binomial.vicepresident.lastname %></label><br>
                    <label class="politic-position">Candidato Vicepresidencia</label>
                  </div>
              </div>
            </div>
          </div>
          <!-- End political card -->
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="profile">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchText" class="form-control">
           </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-3">
            <div class="binomial">
            <div class="president">
              <img src="{{asset('img/lenin-moreno.jpg')}}" alt="Lenin Moreno" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil/1')}}"><span>VER PERFIL</span></a>
            </div>
          </div>
          <br>
            <label class="president-label">Rosita Espinosa</label><br>
        </div>
        <div class="col-md-3">
          <div class="binomial">
          <div class="president">
            <img src="{{asset('img/lenin-moreno.jpg')}}" alt="Lenin Moreno" class="img-circle" width="150px">
            <a href="{{URL::to('/perfil/1')}}"><span>VER PERFIL</span></a>
          </div>
        </div>
        <br>
          <label class="president-label">Rosita Espinosa</label><br>
      </div>
      <div class="col-md-3">
        <div class="binomial">
        <div class="president">
          <img src="{{asset('img/lenin-moreno.jpg')}}" alt="Lenin Moreno" class="img-circle" width="150px">
          <a href="{{URL::to('/perfil/1')}}"><span>VER PERFIL</span></a>
        </div>
      </div>
      <br>
        <label class="president-label">Rosita Espinosa</label><br>
    </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
