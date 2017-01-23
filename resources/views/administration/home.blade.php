@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Dashboard
      <small>Version 1.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Candidatos Presidenciales</span>
            <span class="info-box-number"><% data.published.binomialCandidates %></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Candidatos Asambleístas</span>
            <span class="info-box-number"><% data.published.deputyCandidates %></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Asambleístas</span>
            <span class="info-box-number"><% data.published.deputys %></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Funcionarios Públicos</span>
            <span class="info-box-number"><% data.published.publicServants %></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->



    <!-- /.row -->
  </section>
  <!-- /.content -->
@endsection
