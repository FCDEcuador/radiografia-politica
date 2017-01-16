@extends('layouts.app')

@section('content')
<?php

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
  function formatDate($date)
  {
    //01/01/0001;
    $parts = explode('-',$date);
    return $parts[2].'/'.$parts[1].'/'.$parts[0];
  }

  function getYear($date)
  {
    //01/01/0001;
    $parts = explode('-',$date);
    return $parts[0];
  }

  function getBooleanString($bool)
  {
    switch ($bool) {
      case '1':
        return 'Sí';
      case '0':
        return 'No';
      default:
        return "";
    }
  }
?>
<div class="container">
  <section>
    <div class="row">
      <div class="col-md-12 title">
        <h3>DETALLE DE PERFIL </h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h4>{{$profile->person->name.' '.$profile->person->lastname}}</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 align-c avatar">
          <img src="{{rtrim(asset('/'),'/').$profile->person->img}}" class="img-responsive" />
      </div>
      <div class="col-md-6">
        <div class="row profile-description">
          {!! $profile->person->description !!}
        </div>
        <div class="row btn-profile">
          <a href="{{$profile->person->curriculum}}" target="_blank"><button type="button" class="btn btn-dark">Descargar curriculum</button></a>
        </div>
        <div class="row btn-profile">
            <a href="{{$profile->person->plan}}" target="_blank"><button type="button" class="btn btn-dark">Descargar Plan de gobierno</button></a>
        </div>
        <div class="row btn-profile">
            <a href="{{$profile->person->observatory}}" target="_blank"><button type="button" class="btn btn-dark">Observatorio del candidato</button></a>
        </div>
        <div class="row profile-redes">
          <b>Redes sociales</b>
          <div class="profile-socials">
            <a href="{{$profile->person->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="{{$profile->person->facebook}}"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-offset-1 col-md-2 profile-afiliacion">
        <div class="row">
          <h4>Afiliación Actual:</h4>
        </div>
        <div class="row">
          <img src="{{rtrim(asset('/'),'/').$profile->person->politicalParty->img}}" />
        </div>
        <br>
        <div class="row">
          <label>Binomio:</label>
        </div>
          foto binomio
        <div class="row">
          <a href="{{url('profile/1')}}"><label style="color:#506F93;text-decoration:underline;cursor:pointer;">Jorge Glass</label></a>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="row">
      <div class="col-md-12 title">
        <h3>LÍNEA DE TIEMPO </h3>
      </div>
    </div>
    <section class="cd-horizontal-timeline">
      <div class="timeline vpu-line time-yellow">
        <h4>VIDA PÚBLICA</h4>
        <div id="public-wrapper" class="events-wrapper">
          <div class="events">
            <ol>
              @foreach($profile->person->timelines()->where('typeEvent',1)->orderBy('start')->get() as $timeline)
			           <li><a href="#0" data-date="{{formatDate($timeline->start)}}">{{getYear($timeline->start)}}</a></li>
              @endforeach
            </ol>

            <span class="filling-line" aria-hidden="true"></span>
          </div> <!-- .events -->
        </div> <!-- .events-wrapper -->


        <ul class="cd-timeline-navigation">
          <li><a href="#0" class="prev inactive">Prev</a></li>
          <li><a href="#0" class="next">Next</a></li>
        </ul> <!-- .cd-timeline-navigation -->
      </div> <!-- .timeline -->
      <br>
  	<div class="timeline time-blue">
        <h4>VIDA PRIVADA</h4>
  		<div id="private-wrapper" class="events-wrapper">
  			<div class="events">
  				<ol>
            @foreach($profile->person->timelines()->where('typeEvent',2)->orderBy('start')->get() as $timeline)
               <li><a href="#0" data-date="{{formatDate($timeline->start)}}">{{getYear($timeline->start)}}</a></li>
            @endforeach
  				</ol>

  				<span class="filling-line" aria-hidden="true"></span>
  			</div> <!-- .events -->
  		</div> <!-- .events-wrapper -->


  		<ul class="cd-timeline-navigation">
  			<li><a href="#0" class="prev inactive">Prev</a></li>
  			<li><a href="#0" class="next">Next</a></li>
  		</ul> <!-- .cd-timeline-navigation -->
  	</div> <!-- .timeline -->
    <br>
    <div class="timeline time-red">
      <h4>VIDA POLÍTICA</h4>
      <div id="politician-wrapper" class="events-wrapper">
        <div class="events">
          <ol>
            @foreach($profile->person->timelines()->where('typeEvent',3)->orderBy('start')->get() as $timeline)
               <li><a href="#{{$timeline->id}}" data-date="{{formatDate($timeline->start)}}">{{getYear($timeline->start)}}</a></li>
            @endforeach
          </ol>

          <span class="filling-line" aria-hidden="true"></span>
        </div> <!-- .events -->
      </div> <!-- .events-wrapper -->


      <ul class="cd-timeline-navigation">
        <li><a href="#0" class="prev inactive">Prev</a></li>
        <li><a href="#0" class="next">Next</a></li>
      </ul> <!-- .cd-timeline-navigation -->
    </div> <!-- .timeline -->

  	<div class="events-content">
  		<ol>

			<!-- VIDA PUBLICA -->
        @foreach($profile->person->timelines as $timeline)
  			<li data-date="{{formatDate($timeline->start)}}">
  				<h4>Vida {{getTypeEvent($timeline->typeEvent)}}</h4>
  				<em>{{$timeline->start}} - {{$timeline->end}}</em>
  				<p>
  					{!! $timeline->description !!}
  				</p>
  			</li>
        @endforeach
             <!-- FIN VIDA POLITICA -->

  		</ol>
  	</div> <!-- .events-content -->
  </section>
  </section>
  <section id="transparency">
    <div class="row">
      <div class="col-md-12 title">
        <h3>TRANSPARENCIA </h3>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-6">
        <div class="well well-lg well-transparency transparencia-sri">
          <div class="well-title">
            <span class="well-card-title">SRI<span>
          </div>
          <div class="row well-body">
            <div class="col-md-6">
              <table class="table" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Año</th>
                    <th>Impuesto a la Renta</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($profile->sri()->where('taxType',1)->get() as $sri)
                  <tr>
                    <td>{{$sri->year}}</td>
                    <td>{{$sri->value}}</td>
                  </tr>
                  @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-6">
              <table class="table" style="text-align:center;">
                <thead>
                  <tr>
                    <th>Año</th>
                    <th>Imp. salida de divisas</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($profile->sri()->where('taxType',2)->get() as $sri)
                  <tr>
                    <td>{{$sri->year}}</td>
                    <td>{{$sri->value}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="well-footer">
            <div class="row">
              <div class="col-md-8">
                <button type="button" class="btn btn-dark">VER FUENTE</button>
              </div>
                <div class="col-md-4 share-transaprency">
                  <label>Comparte</label>
                  <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="well well-lg well-transparency transparencia-patrimonio">
          <div class="well-title">
            <span class="well-card-title">DECLARACION PATRIMONIAL<span>
          </div>
          <div class="well-body">
            <div class="row patrimonial-declaration-icons">
              <div class="col-md-3">
                <div class="img-responsive hint--top" data-hint="VIVIENDAS">
                  <img src="/img/ico-vivienda.png">
                </div>
                <div>{{$profile->heritage->houses}}</div>
              </div>
              <div class="col-md-3">
                <div class="img-responsive hint--top" data-hint="VEHÍCULOS">
                  <img src="/img/ico-auto.png">
                </div>
                <div>{{$profile->heritage->cars}}</div>
              </div>
              <div class="col-md-3">
                <div class="img-responsive hint--top" data-hint="PATRIMONIO">
                  <img src="/img/ico-dinero.png">
                </div>
                <div>{{$profile->heritage->money}}</div>
              </div>
              <div class="col-md-3">
                <div class="img-responsive hint--top" data-hint="COMPAÑÍAS">
                  <img src="/img/ico-industria.png">
                </div>
                <div>{{$profile->heritage->companies}}</div>
              </div>
            </div>
            <div class="row">
            <table class="table">
              <tr>
                <th>Fecha de declaración</th>
                <td>{{$profile->heritage->previousDeclaration}}</td>
                <td>{{$profile->heritage->actualDeclaration}}</td>
              </tr>
              <tr>
                <th>Activos</th>
                <td>{{$profile->heritage->previousAssets}}</td>
                <td>{{$profile->heritage->actualAssets}}</td>
              </tr>
              <tr>
                <th>Pasivos</th>
                <td>{{$profile->heritage->previousLiabilities}}</td>
                <td>{{$profile->heritage->actualLiabilities}}</td>
              </tr>
              <tr>
                <th>Patrimonio</th>
                <td>{{$profile->heritage->previousHeritage}}</td>
                <td>{{$profile->heritage->actualHeritage}}</td>
              </tr>
            </table>
            </div>
          </div>
          <div class="well-footer">
            <div class="row">
              <div class="col-md-8">
                <button type="button" class="btn btn-dark">VER FUENTE</button>
              </div>
                <div class="col-md-4 share-transaprency">
                  <label>Comparte</label>
                  <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-md-4">
        <div class="well well-lg well-transparency transparencia-superintendencia">
          <div class="well-title">
            <span class="well-card-title">SUPERINTENDENCIA DE COMPAÑÍAS<span>
          </div>
          <div class="row well-body">
            <table class="table table-vertical">
              <col width="50%">
              <col width="50%">
              <tr>
                <th>Gerente</th>
                <td>{{($profile->companies()->where('position',1)->first() != null) ? $profile->companies()->where('position',1)->first()->total_companies : 0}}</td>
              </tr>
              <tr>
                <th>Presidente</th>
                <td>{{($profile->companies()->where('position',2)->first() != null) ? $profile->companies()->where('position',2)->first()->total_companies : 0}}</td>
              </tr>
              <tr>
                <th>Accionista</th>
                <td>{{($profile->companies()->where('position',3)->first() != null) ? $profile->companies()->where('position',3)->first()->total_companies : 0}}</td>
              </tr>
            </table>
          </div>
          <div class="well-footer">
            <div class="row">
              <div class="col-md-7">
                <button type="button" class="btn btn-dark">VER FUENTE</button>
              </div>
                <div class="col-md-5 share-transaprency">
                  <label>Comparte</label>
                  <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="well well-lg well-transparency transparencia-antecedentes">
          <div class="well-title">
            <span class="well-card-title">ANTECEDENTES<span>
          </div>
          <div class="well-body">
            <div class="row">
              <div class="col-md-6">
                <label>ACTOR</label>
                <table class="table" style="text-align:center;">
                  <thead>
                    <tr>
                      <th>Tipo de juicio</th>
                      <th>Cantidad</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($profile->judicials()->where('type',1)->get() as $judgment)
                    <tr>
                      <td>{{$judgment->judgment_type->name}}</td>
                      <td>{{$judgment->number}}</td>
                    </tr>
                    @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-6">
                <label>DEMANDADO</label>
                <table class="table" style="text-align:center;">
                  <thead>
                    <tr>
                      <th>Tipo de juicio</th>
                      <th>Cantidad</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($profile->judicials()->where('type',2)->get() as $judgment)
                    <tr>
                      <td>{{$judgment->judgment_type->name}}</td>
                      <td>{{$judgment->number}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="well-footer">
            <div class="row">
              <div class="col-md-8">
                <button type="button" class="btn btn-dark">VER FUENTE</button>
              </div>
                <div class="col-md-4 share-transaprency">
                  <label>Comparte</label>
                  <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>
      <!-- end row -->
      <div class="row">
        <div class="col-md-4">
          <div class="well well-lg well-transparency transparencia-senescyt">
            <div class="well-title">
              <span class="well-card-title">SENESCYT<span>
            </div>
            <div class="row well-body">
              <table class="table table-vertical">
                <col width="50%">
                <col width="50%">
                <tr>
                  <th>Tercer Nivel</th>
                  <td>{{$profile->study->profession}}</td>
                </tr>
                <tr>
                  <th>Maestría</th>
                  <td>{{$profile->study->postgrad}}</td>
                </tr>
                <tr>
                  <th>PhD</th>
                  <td>{{$profile->study->phd}}</td>
                </tr>
              </table>
            </div>
            <div class="well-footer">
              <div class="row">
                <div class="col-md-8">
                  <button type="button" class="btn btn-dark">VER FUENTE</button>
                </div>
                  <div class="col-md-4 share-transaprency">
                    <label>Comparte</label>
                    <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="well well-lg well-transparency transparencia-contraloria">
            <div class="well-title">
              <span class="well-card-title">CONTRALORÍA<span>
            </div>
            <div class="row well-body">
              <table class="table table-vertical">
                <col width="50%">
                <col width="50%">
                <tr>
                  <th>Procesos</th>
                  <td>{{$profile->comptroller->processes}}</td>
                </tr>
              </table>
            </div>
            <div class="well-footer">
              <div class="row">
                <div class="col-md-8">
                  <button type="button" class="btn btn-dark">VER FUENTE</button>
                </div>
                  <div class="col-md-4 share-transaprency">
                    <label>Comparte</label>
                    <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="well well-lg well-transparency transparencia-contraloria">
            <div class="well-title">
              <span class="well-card-title">ANTECEDENTES PENALES<span>
            </div>
            <div class="row well-body">
              <div class="row">
                <div class="col-md-12">
                  <label>Antecedentes Penales:&nbsp;&nbsp;</label> <label>{{getBooleanString($profile->hasPenals)}}</label>
                </div>
              </div>
            </div>
            <div class="well-footer">
              <div class="row">
                <div class="col-md-8">
                  <button type="button" class="btn btn-dark">VER FUENTE</button>
                </div>
                  <div class="col-md-4 share-transaprency">
                    <label>Comparte</label>
                    <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
<script>
$(function() {
    $('.well').matchHeight();
});
</script>
@endsection
