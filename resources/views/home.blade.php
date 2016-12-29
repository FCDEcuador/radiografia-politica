@extends('layouts.app')

@section('content')
    <div class="main-header">
    </div>
    <div class="container main-content">
        <div class="row">
            <div class="col-md-12 ">
                <h1 class="pull-right">ELECCIONES 2017</h1>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <!-- Nav tabs -->
        {{--<ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Candidatos Presidencia</a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Candidatos Asamblea</a></li>
        </ul>--}}

        <!-- Tab panes -->
            {{--<div class="tab-content">
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
            </div>--}}

            <ul class="accordion-tabs-minimal">
                <li class="tab-header-and-content">
                    <a href="#" class="tab-link is-active">Candidatos Presidencia</a>
                    <div class="tab-content">
                        <div class="row">
                            <% binomails | json %>
                            <!-- Init political card -->
                            <div class="politics-card col-md-6" >
                                <div class="row">
                                    <div class="col-md-8 col-lg-6">
                                        <div class="binomial">
                                            <div class="president">
                                                <img ng-src="{{asset('img').'/'}}<% binomial.president.picture %>"
                                                     alt="<% binomial.president.name %>" class="img-circle"
                                                     width="150px">
                                                <a href="{{URL::to('/perfil/1')}}"><span>VER PERFIL</span></a>
                                            </div>
                                            <div class="vicepresident">
                                                <img ng-src="{{asset('img').'/'}}<% binomial.vicepresident.picture %>"
                                                     alt="<% binomial.vicepresident.name %>" class="img-circle"
                                                     width="100px">
                                                <a href="{{URL::to('/perfil/1')}}"><span>VER PERFIL</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-6" style="text-align: center;">
                                        <div class="row">
                                            <img src="{{asset('img/alianza-pais.jpg')}}" class="political-party-logo">
                                        </div>
                                        <div class="row">
                                            <label class="president-label"><% binomial.president.name + " " +
                                                binomial.president.lastname %></label><br>
                                            <label class="politic-position">Candidato Presidencia</label>
                                        </div>
                                        <div class="row">
                                            <label class="vicepresident-label"><% binomial.vicepresident.name + " " +
                                                binomial.vicepresident.lastname %></label><br>
                                            <label class="politic-position">Candidato Vicepresidencia</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End political card -->
                        </div>
                    </div>
                </li>
                <li class="tab-header-and-content">
                    <a href="#" class="tab-link">Candidatos Vice Presidencia</a>
                    <div class="tab-content">
                        <p>Ut laoreet augue et neque pretium non sagittis nibh pulvinar. Etiam ornare tincidunt orci
                            quis ultrices. Pellentesque ac sapien ac purus gravida ullamcorper. Duis rhoncus sodales
                            lacus, vitae adipiscing tellus pharetra sed. Praesent bibendum lacus quis metus condimentum
                            ac accumsan orci vulputate. Aenean fringilla massa vitae metus facilisis congue. Morbi
                            placerat eros ac sapien semper pulvinar. Vestibulum facilisis, ligula a molestie venenatis,
                            metus justo ullamcorper ipsum, congue aliquet dolor tortor eu neque. Sed imperdiet, nibh ut
                            vestibulum tempor, nibh dui volutpat lacus, vel gravida magna justo sit amet quam. Quisque
                            tincidunt ligula at nisl imperdiet sagittis. Morbi rutrum tempor arcu, non ultrices sem
                            semper a. Aliquam quis sem mi.</p>
                    </div>
                </li>

            </ul>


        </div>
    </div>
@endsection
