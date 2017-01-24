@extends('layouts.app')

@section('content')
<div class="main-header">

</div>
<div class="container">
  <div class="row">
    <div class="col-md-12 right title-elecciones">
      <h2>ELECCIONES 2017</h2>
    </div>
  </div>
  <div class="row">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Candidatos Presidencia</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Candidatos Asamblea</a></li>
      <li role="presentation"><a href="#generalComptroller" aria-controls="generalComptroller" role="tab" data-toggle="tab">Contralor General del Estado</a></li>
      <li role="presentation"><a href="#ombudsman" aria-controls="ombudsman" role="tab" data-toggle="tab">Defensor del Pueblo</a></li>
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
                    <img ng-src="{{rtrim(asset('/'), '/')}}<% binomial.president.picture %>" alt="<% binomial.president.person.name %>" class="img-circle" width="200px">
                    <a href="{{URL::to('/perfil/').'/'}}<% binomial.president.id %>"><span>VER PERFIL</span></a>
                  </div>
                  <div class="vicepresident">
                    <img ng-src="{{rtrim(asset('/'), '/')}}<% binomial.vicepresident.picture %>" alt="<% binomial.vicepresident.person.name %>" class="img-circle" width="150px">
                    <a href="{{URL::to('/perfil/').'/'}}<% binomial.vicepresident.id %>"><span>VER PERFIL</span></a>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-lg-4" style="text-align: center;">
                  <div class="row">
                    <img ng-src="{{rtrim(asset('/'), '/')}}<% binomial.partido.img %>" class="political-party-logo" width="70px">
                  </div>
                  <div class="row" style="line-height: 15px;">
                    <a class="president-label" href="{{URL::to('/perfil/').'/'}}<% binomial.president.id %>"><label><% binomial.president.person.name + " " +  binomial.president.person.lastname %></label></a>
                    <label class="politic-position">Candidato Presidencia</label>
                  </div>
                  <div class="row" style="line-height: 15px;">
                  <a  class="vicepresident-label" href="{{URL::to('/perfil/').'/'}}<% binomial.vicepresident.id %>"><label><% binomial.vicepresident.person.name + " " +  binomial.vicepresident.person.lastname %></label></a>
                    <label class="politic-position">Candidato Vicepresidencia</label>
                  </div>
              </div>
            </div>
          </div>
          <!-- End political card -->
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="profile" ng-controller="DeputyController">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchText" class="form-control">
           </div>
        </div>
        <br>
        <div class="row list-casamblea">

          <div class="col-md-3" ng-repeat="deputy in deputys">
            <div class="binomial">
            <div class="president">
              <img ng-src="{{rtrim(asset('/'), '/')}}<% deputy.picture %>" alt="<% depty.person.name %>" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil')}}<% '/' + deputy.id %>"><span>VER PERFIL</span></a>
            </div>
          </div>
            <label class="align-c president-label"><% deputy.person.name + " " + deputy.person.lastname %></label><br>
        </div>

        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="generalComptroller" ng-controller="GeneralComptrollerController">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchText" class="form-control">
           </div>
        </div>
        <br>
        <div class="row list-casamblea">

          <div class="col-md-3" ng-repeat="generalComptroller in generalComptrollers">
            <div class="binomial">
            <div class="president">
              <img ng-src="{{rtrim(asset('/'), '/')}}<% generalComptroller.picture %>" alt="<% generalComptroller.person.name %>" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil')}}<% '/' + generalComptroller.id %>"><span>VER PERFIL</span></a>
            </div>
          </div>
            <label class="align-c president-label"><% generalComptroller.person.name + " " + generalComptroller.person.lastname %></label><br>
        </div>

        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="ombudsman" ng-controller="OmbudsmanController">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchText" class="form-control">
           </div>
        </div>
        <br>
        <div class="row list-casamblea">

          <div class="col-md-3" ng-repeat="ombudsman in ombudsmen">
            <div class="binomial">
            <div class="president">
              <img ng-src="{{rtrim(asset('/'), '/')}}<% ombudsman.picture %>" alt="<% ombudsman.person.name %>" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil')}}<% '/' + ombudsman.id %>"><span>VER PERFIL</span></a>
            </div>
          </div>
            <label class="align-c president-label"><% ombudsman.person.name + " " + ombudsman.person.lastname %></label><br>
        </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
