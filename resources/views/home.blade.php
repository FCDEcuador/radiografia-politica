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
    <ul class="nav nav-tabs" role="tablist" id="myTab">
      <!-- <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Candidatos Presidencia</a></li> -->
      <li role="presentation" class="active"><a href="#ejecutivo" aria-controls="ejecutivo" role="tab" data-toggle="tab">Ejecutivo</a></li>
      <!-- <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Candidatos Asamblea</a></li> -->
      <li role="presentation"><a href="#legislativo" aria-controls="legislativo" role="tab" data-toggle="tab">Legislativo</a></li>
      <li role="presentation"><a href="#judicial" aria-controls="judicial" role="tab" data-toggle="tab">Judicial</a></li>
      <li role="presentation"><a href="#electoral" aria-controls="electoral" role="tab" data-toggle="tab">Electoral</a></li>
      <li role="presentation"><a href="#participacion-cuidadana-y-control-social" aria-controls="participacion-cuidadana-y-control-social" role="tab" data-toggle="tab">Participación Ciudadana y Control Social</a></li>
      <li role="presentation"><a href="#otras-autoridades" aria-controls="otras-autoridades" role="tab" data-toggle="tab">Otras autoridades</a></li>
      <li role="presentation"><a href="#concursos-publicos" aria-controls="concursos-publicos" role="tab" data-toggle="tab">Concursos públicos</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <!-- <div role="tabpanel" class="tab-pane active" id="home" ng-controller="PresidentController">
        <div class="row">
          <!-- Init political card -->
          <!--  <div class="politics-card col-md-6" ng-repeat="binomial in binomails" ng-cloak>
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
        <!--  </div>
      </div> -->
      <div role="tabpanel" class="tab-pane" id="ejecutivo" ng-controller="EjecutiveController">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchTextDeputy" class="form-control">
           </div>
        </div>
        <br>
        <div class="row list-casamblea">

          <div class="col-md-3" ng-repeat="ejecutive in ejecutives | filter: searchTextDeputy" ng-cloak>
            <div class="binomial">
            <div class="president">
              <img ng-src="{{rtrim(asset('/'), '/')}}<% ejecutive.picture %>" alt="<% ejecutive.person.name %>" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil')}}<% '/' + ejecutive.id %>"><span>VER PERFIL</span></a>
            </div>
          </div>
            <label class="align-c president-label"><% ejecutive.person.name + " " + ejecutive.person.lastname %></label><br>
        </div>

        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="legislativo" ng-controller="LegistativeController">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchTextDeputy" class="form-control">
           </div>
        </div>
        <br>
        <div class="row list-casamblea">

          <div class="col-md-3" ng-repeat="legislative in legislatives | filter: searchTextDeputy" ng-cloak>
            <div class="binomial">
            <div class="president">
              <img ng-src="{{rtrim(asset('/'), '/')}}<% legislative.picture %>" alt="<% legislative.person.name %>" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil')}}<% '/' + legislative.id %>"><span>VER PERFIL</span></a>
            </div>
          </div>
            <label class="align-c president-label"><% legislative.person.name + " " + legislative.person.lastname %></label><br>
        </div>

        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="judicial" ng-controller="JudicialController">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchTextDeputy" class="form-control">
           </div>
        </div>
        <br>
        <div class="row list-casamblea">

          <div class="col-md-3" ng-repeat="judicial in judicials | filter: searchTextDeputy" ng-cloak>
            <div class="binomial">
            <div class="president">
              <img ng-src="{{rtrim(asset('/'), '/')}}<% judicial.picture %>" alt="<% judicial.person.name %>" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil')}}<% '/' + judicial.id %>"><span>VER PERFIL</span></a>
            </div>
          </div>
            <label class="align-c president-label"><% judicial.person.name + " " + judicial.person.lastname %></label><br>
        </div>

        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="electoral" ng-controller="ElectoralController">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchTextDeputy" class="form-control">
           </div>
        </div>
        <br>
        <div class="row list-casamblea">

          <div class="col-md-3" ng-repeat="electoral in electorals | filter: searchTextDeputy" ng-cloak>
            <div class="binomial">
            <div class="president">
              <img ng-src="{{rtrim(asset('/'), '/')}}<% electoral.picture %>" alt="<% electoral.person.name %>" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil')}}<% '/' + electoral.id %>"><span>VER PERFIL</span></a>
            </div>
          </div>
            <label class="align-c president-label"><% electoral.person.name + " " + electoral.person.lastname %></label><br>
        </div>

        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="participacion-cuidadana-y-control-social" ng-controller="CitizenParticipationController">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchTextDeputy" class="form-control">
           </div>
        </div>
        <br>
        <div class="row list-casamblea">

          <div class="col-md-3" ng-repeat="citizen in citizens | filter: searchTextDeputy" ng-cloak>
            <div class="binomial">
            <div class="president">
              <img ng-src="{{rtrim(asset('/'), '/')}}<% citizen.picture %>" alt="<% citizen.person.name %>" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil')}}<% '/' + citizen.id %>"><span>VER PERFIL</span></a>
            </div>
          </div>
            <label class="align-c president-label"><% citizen.person.name + " " + citizen.person.lastname %></label><br>
        </div>

        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="otras-autoridades" ng-controller="OtherAuthoritiesController">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchTextDeputy" class="form-control">
           </div>
        </div>
        <br>
        <div class="row list-casamblea">

          <div class="col-md-3" ng-repeat="other in others | filter: searchTextDeputy" ng-cloak>
            <div class="binomial">
            <div class="president">
              <img ng-src="{{rtrim(asset('/'), '/')}}<% other.picture %>" alt="<% other.person.name %>" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil')}}<% '/' + other.id %>"><span>VER PERFIL</span></a>
            </div>
          </div>
            <label class="align-c president-label"><% other.person.name + " " + other.person.lastname %></label><br>
        </div>

        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="concursos-publicos" ng-controller="PublicCompetitionController">
        <div class="row">
          <div class="input-group">
             <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
             <input type="text" ng-model="searchTextDeputy" class="form-control">
           </div>
        </div>
        <br>
        <div class="row list-casamblea">

          <div class="col-md-3" ng-repeat="public in publics | filter: searchTextDeputy" ng-cloak>
            <div class="binomial">
            <div class="president">
              <img ng-src="{{rtrim(asset('/'), '/')}}<% public.picture %>" alt="<% public.person.name %>" class="img-circle" width="150px">
              <a href="{{URL::to('/perfil')}}<% '/' + public.id %>"><span>VER PERFIL</span></a>
            </div>
          </div>
            <label class="align-c president-label"><% public.person.name + " " + public.person.lastname %></label><br>
        </div>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
}

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
})
</script>
@endsection
