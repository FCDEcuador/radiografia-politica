@extends('layouts.app')

@section('content')
<div class="main-header">

</div>
<div class="container">
  <div class="row">
    <div class="col-md-12 right">
      <h2>ELECCIONES 2017</h2>
    </div>
  </div>
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
              <div class="col-md-10 col-lg-8">
                <div class="binomial">
                  <div class="president">
                    <img ng-src="{{asset('img/perfiles').'/'}}<% binomial.president.picture %>" alt="<% binomial.president.name %>" class="img-circle" width="200px">
                    <a href="{{URL::to('/perfil/1')}}"><span>VER PERFIL</span></a>
                  </div>
                  <div class="vicepresident">
                    <img ng-src="{{asset('img/perfiles').'/'}}<% binomial.vicepresident.picture %>" alt="<% binomial.vicepresident.name %>" class="img-circle" width="150px">
                    <a href="{{URL::to('/perfil/1')}}"><span>VER PERFIL</span></a>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-lg-4" style="text-align: center;">
                  <div class="row">
                    <img ng-src="{{asset('img/political-parties').'/'}}<% binomial.partido.icon %>" class="political-party-logo" width="70px">
                  </div>
                  <div class="row" style="line-height: 15px;">
                    <a class="president-label" href="{{URL::to('/perfil/1')}}"><label><% binomial.president.name + " " +  binomial.president.lastname %></label></a>
                    <label class="politic-position">Candidato Presidencia</label>
                  </div>
                  <div class="row" style="line-height: 15px;">
                  <a  class="vicepresident-label" href="{{URL::to('/perfil/1')}}"><label><% binomial.vicepresident.name + " " +  binomial.vicepresident.lastname %></label></a>
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
