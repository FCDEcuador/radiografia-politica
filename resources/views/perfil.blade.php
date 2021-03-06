@extends('layouts.app')

@section('metas')
<?php  setlocale(LC_MONETARY, 'en_US');?>
<?php
function onlyText($html)
{
    $string = strip_tags($html);
    return $string;
}

function renderMessage($message,$profile)
{
    $renderMessage = $message;

    while(strrpos($renderMessage,'[[') != false)
    {
        $start = strrpos($renderMessage,'[[');
        $end = strrpos($renderMessage,']]');
        $beforeMessage = substr($renderMessage,0,$start);
        $afterMessage = substr($renderMessage,$end+2,strlen($renderMessage));
        $key = substr($renderMessage,$start+2,($end-$start-2));
        $person = $profile->person->toArray();
        $replace = "";
        switch ($key) {
            case 'ncompanies':
                $ncompanies = 0;
                /*foreach ($profile->companies as $company) {
                    $ncompanies += $company->total_companies;
                }*/
                $ncompanies = $profile->companies->count();
                $replace = (string)$ncompanies;
                break;
            case 'nshareholder':
                $ncompanies = 0;
                /*foreach ($profile->companies()->where('position',3)->get() as $company) {
                    $ncompanies += $company->total_companies;
                }*/
                $ncompanies = $profile->companies()->where('position',3)->count();
                $replace = (string)$ncompanies;
                break;
            case 'njudgments':
                $njudgments = 0;
                foreach ($profile->judicials as $judicial) {
                    $njudgments += $judicial->number;
                }
                $replace = (string)$njudgments;
                break;
            case 'ntitles':
                $ntitles = 0;
                $study = $profile->study->toArray();


                $ntitles += $study['pregrade'];
                $ntitles += $study['postgrad'];
                $ntitles += $study['phd'];

                $replace = (string)$ntitles;
                break;
            case 'ncomptrollers':
                $ncomptrollers = $profile->comptroller->processes;
                $replace = (string)$ncomptrollers;
                break;
            case 'nsri':
                $nsri = $profile->sri->where('taxType',1)->where('year',date('Y')-1)->first();
                if ($nsri != null) {
                    $replace = (string)$nsri->value;
                }else{
                    $replace = "0";
                }

                break;
            default:
                if($key == "twitter"){
                  if($person[$key] == ""){
                    $beforeMessage = substr($beforeMessage, 0, -1);
                    $replace = "#".clearSpaces($person['name']).clearSpaces($person['lastname']);
                  }else {
                    $replace = $person[$key];
                  }
                }else{
                  $replace = $person[$key];
                }

                break;
        }

        $renderMessage = $beforeMessage.$replace.$afterMessage;
    }

    return $renderMessage;

}
function clearSpaces($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>


<meta property="og:url" content="{{url(route('perfil',$profile->id))}}" />
<meta property="og:title" content="Perfil - {{$profile->person->name.' '.$profile->person->lastname}}" />
<meta property="og:description" content="{{onlyText($profile->person->description)}}" />
<meta property="og:image" content="{{url($profile->person->img)}}" />
<meta property="og:hashtag" content="{{"#RadiografiaPolitica ".'#'.$profile->person->name.$profile->person->lastname}}" />
<meta proerty="og:image:width" content="300px" />
<meta property="fb:app_id" content="363202350719048" />
<meta property="og:locale" content="es_LA" />
<meta property="og:updated_time" content="{{$profile->updated_at}}" />
<meta property="og:rich_attachment" content="true" />
@endsection

@section('content')
<?php

function getTypeEvent($id)
{
    switch ($id) {
        case '1':
            return "FUNCIÓN PÚBLICA";
        case '2':
            return "FUNCIÓN PRIVADA";
        case '3':
            return "ACTIVIDAD POLÍTICA";
        default:
            return "";
    }
}
function formatDate($date)
{
    //01/01/0001;
    if($date != null)
    {
        $parts = explode('-',$date);
        return $parts[2].'/'.$parts[1].'/'.$parts[0];
    }else {
        return "";
    }

}

function formatDate2($date)
{
    //01/01/0001;
    if($date != null)
    {
        $parts = explode('-',$date);
        return $parts[1].'/'.$parts[0];
    }else {
        return "Presente";
    }

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
            <div class="col-md-9">
                <div class="col-md-12">
                    <h4>{{$profile->person->name.' '.$profile->person->lastname}}</h4>
                </div>
                <div class="col-md-4 align-c avatar">
                    <img src="{{rtrim(asset('/'),'/').$profile->person->img}}" class="img-responsive" />
                </div>
                <div class="col-md-8">
                    <div class="row profile-description">
                        {!! $profile->person->description !!}
                    </div>
                    <div class="row btn-profile">
                        <a href="{{url('perfil',$profile->id).'/excel'}}" target="_blank"><button type="button" class="btn btn-success" style="margin-bottom:10px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp; Excel</button></a>
                        <a href="{{url('perfil',$profile->id).'/csv'}}" target="_blank"><button type="button" class="btn btn-success" style="margin-bottom:10px;"> CSV</button></a>
                    </div>
                    <div class="row btn-profile">
                        <a href="{{$profile->person->curriculum}}" target="_blank"><button type="button" class="btn btn-dark">Descargar curriculum</button></a>
                    </div>
                    @if(!empty($profile->person->plan))
                    <div class="row btn-profile">
                        <a href="{{$profile->person->plan}}" target="_blank"><button type="button" class="btn btn-dark">Descargar Plan de gobierno</button></a>
                    </div>
                    @endif
                    @if(!empty($profile->person->observatory))
                    <div class="row btn-profile">
                        <img src="{{asset('img/observatorio-color.jpeg')}}" style="width:20%; height:20%;">
                        <a href="{{$profile->person->observatory}}" target="_blank"><button type="button" class="btn btn-dark">Gestión como Asambleísta</button></a>
                    </div>
                    @endif
                    <div class="row profile-redes">
                        <b>Redes sociales</b>
                        <div class="profile-socials">
                          @if(!empty($profile->person->twitter))
                            <a href="https://twitter.com/{{$profile->person->twitter}}" target="_blank"><i class="fa fa-twitter"  aria-hidden="true" style="color:#1da1f2; font-size: 30px;"></i></a>
                            @endif
                            @if(!empty($profile->person->facebook))
                            <a href="{{$profile->person->facebook}}" target="_blank"><i class="fa fa-facebook-official"  aria-hidden="true" style="color:#00549f; font-size: 30px;"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-2 profile-afiliacion">
                @if($profile->person->politicalParty != null)
                <div class="row">
                    <h4>Afiliación Actual:</h4>
                </div>
                <div class="row">
                    <img src="{{rtrim(asset('/'),'/').$profile->person->politicalParty->img}}" />
                </div>
                @endif
                <br>
                @if(!empty($binomial))
                <div class="row">
                    <label>Binomio:</label>
                </div>
                <div class="row">
                    <a href="{{url('perfil/').'/'.$binomial->id}}"><img src="{{rtrim(asset('/'),'/').$binomial->picture}}" class="img-circle" width="150px" /></a>
                </div>
                <div class="row">
                    <a href="{{url('perfil/').'/'.$binomial->id}}"><label style="color:#506F93;text-decoration:underline;cursor:pointer;">{{$binomial->person->name." ".$binomial->person->lastname}}</label></a>
                </div>
                @endif
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-md-12 title">
                <h3>LÍNEA DE TIEMPO </h3>
                <h5>Pulsa sobre cada año para conocer el evento generado </h5>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-dark blink_me" data-toggle="modal" data-target=".bs-example-modal-lg">DESTACADOS</button>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Destacados</h4>
                            </div>
                            <div class="modal-body">
                                @foreach($profile->person->timelines()->where('important',1)->orderBy('start')->get() as $timeline)
                                <h2>{{$timeline->shortDescription}}</h2>
                                <h4>{{getTypeEvent($timeline->typeEvent)}}</h4>
                                <em>{{formatDate2($timeline->start)}} - {{formatDate2($timeline->end)}}</em>
                                <p>
                                    {!! $timeline->description !!}
                                </p>
								<p>
                                   <a href="{!! $timeline->source !!}" target=_blank> Ver Fuente </a>
                                </p>
                                <hr>
                                </hr>
                                @endforeach
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col-md-offset-7 col-md-2">

                <div class="share-transaprency">
                    <label style="color:#3780c2">Comparte</label></br>
                    <a href="https://twitter.com/intent/tweet?text={{urlencode(renderMessage($message->timelineMessage,$profile))}}&url={{url(route('perfil',$profile->id))}}" class="twitter customer share"target="_blank" ><i class="fa fa-twitter" aria-hidden="true" style="color:#1da1f2; font-size: 30px;"></i></a>
                    <a href=""><i class="fa fa-facebook-official shareBtn" aria-hidden="true" style="color:#00549f; font-size: 30px;"></i></a>
                </div>
            </div>
        </div>
        <section class="cd-horizontal-timeline">
            <div class="timeline vpu-line time-yellow">
                <h4>FUNCIÓN PÚBLICA</h4>
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
                <h4>FUNCIÓN PRIVADA</h4>
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
                <h4>ACTIVIDAD POLÍTICA</h4>
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
                        <h4>{{getTypeEvent($timeline->typeEvent)}}</h4>
                        <em>{{formatDate2($timeline->start)}} - {{formatDate2($timeline->end)}}</em>
                        <h3>{{$timeline->shortDescription}}</h3>
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
            <span class="well-card-title">SRI IMPUESTOS<span>
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
                                @foreach($profile->sri()->where('taxType',1)->orderBy('year','desc')->limit(5)->get() as $sri)
                                <tr>
                                    <td>{{$sri->year}}</td>
                                    <td>{{money_format('%(#10n', $sri->value)}}</td>
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
                                @foreach($profile->sri()->where('taxType',2)->orderBy('year','desc')->limit(5)->get() as $sri)
                                <tr>
                                    <td>{{$sri->year}}</td>
                                    <td>{{money_format('%(#10n', $sri->value)}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="well-footer">
                        <div class="row">
                            <div class="col-md-3">
                                <a href ="{{$profile->urlSri}}" target="_blank"><button type="button" class="btn btn-dark">VER FUENTE</button>
                            </div>
                            <div class="col-md-3">
                                <a href ="{{$profile->fileSri}}" target="_blank"><button type="button" class="btn btn-dark">VER ARCHIVO</button>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4 share-transaprency">
                                <label style="color:#3780c2">Comparte</label></br>
                                <a href="https://twitter.com/intent/tweet?text={{urlencode(renderMessage($message->SRIMessage,$profile))}}&url={{url(route('perfil',$profile->id))}}" class="twitter customer share"target="_blank"><i class="fa fa-twitter" aria-hidden="true" style="color:#1da1f2; font-size: 30px;"></i></a>
                                <a href=""><i class="fa fa-facebook-official shareBtn" aria-hidden="true" style="color:#00549f; font-size: 30px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="well well-lg well-transparency transparencia-patrimonio">
                    <div class="well-title">
            <span class="well-card-title">DECLARACIÓN PATRIMONIAL<span>
                    </div>
                    <div class="well-body">
                      @if((($profile->heritage->actualDeclaration)!= 0)||(($profile->heritage->previousDeclaration)!= 0) )
                        <div class="row patrimonial-declaration-icons">
                            <div class="col-md-3">
                                <div class="img-responsive hint--top" data-hint="INMUEBLES">
                                    <img src="{{asset('img/ico-vivienda.png')}}">
                                </div>
                                <div>{{$profile->heritage->houses}}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="img-responsive hint--top" data-hint="VEHÍCULOS">
                                    <img src="{{asset('img/ico-auto.png')}}">
                                </div>
                                <div>{{$profile->heritage->cars}}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="img-responsive hint--top" data-hint="PATRIMONIO">
                                    <img src="{{asset('img/ico-dinero.png')}}">
                                </div>
                                <div>{{money_format('%(#10n', $profile->heritage->money)}}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="img-responsive hint--top" data-hint="COMPAÑÍAS">
                                    <img src="{{asset('img/ico-industria.png')}}">
                                </div>
                                <div>{{$profile->heritage->companies}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    @if(($profile->heritage->actualDeclaration)!= 0)
                                    <th>Declaración Actual</th>
                                    @endif
                                    @if(($profile->heritage->previousDeclaration)!= 0)
                                    <th>Declaración Previa</th>
                                    @endif
                                </tr>
                                </thead>
                                <tr>
                                    <th>Fecha de declaración</th>
                                    @if(($profile->heritage->actualDeclaration)!= 0)
                                    <td>{{$profile->heritage->actualDeclaration}}</td>
                                    @endif
                                    @if(($profile->heritage->previousDeclaration)!= 0)
                                    <td>{{$profile->heritage->previousDeclaration}}</td>
                                    @endif

                                </tr>
                                <tr>
                                    <th>Activos</th>
                                    @if(($profile->heritage->actualDeclaration)!= 0)
                                    <td>{{money_format('%(#10n', $profile->heritage->actualAssets)}}</td>
                                    @endif
                                    @if(($profile->heritage->previousDeclaration)!= 0)
                                    <td>{{money_format('%(#10n', $profile->heritage->previousAssets)}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Pasivos</th>
                                    @if(($profile->heritage->actualDeclaration)!= 0)
                                    <td>{{money_format('%(#10n', $profile->heritage->actualLiabilities)}}</td>
                                    @endif
                                    @if(($profile->heritage->previousDeclaration)!= 0)
                                    <td>{{money_format('%(#10n', $profile->heritage->previousLiabilities)}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Patrimonio</th>
                                    @if(($profile->heritage->actualDeclaration)!= 0)
                                    <td>{{money_format('%(#10n', $profile->heritage->actualHeritage)}}</td>
                                    @endif
                                    @if(($profile->heritage->previousDeclaration)!= 0)
                                    <td>{{money_format('%(#10n', $profile->heritage->previousHeritage)}}</td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                        @endif
                        @if((($profile->heritage->actualDeclaration)== 0)&&(($profile->heritage->previousDeclaration)== 0))
                        <th>No poseemos información</th>
                        @endif
                    </div>
                    <div class="well-footer">
                      @if((($profile->heritage->actualDeclaration)!= 0)||(($profile->heritage->previousDeclaration)!= 0) )

                        <div class="row">
                            <div class="col-md-3">
                                <a href ="{{$profile->urlHeritage}}" target="_blank"><button type="button" class="btn btn-dark">VER FUENTE</button>
                            </div>
                            <div class="col-md-3">
                                <a href ="{{$profile->fileHeritage}}" target="_blank"><button type="button" class="btn btn-dark">VER ARCHIVO</button>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4 share-transaprency">
                                <label style="color:#3780c2">Comparte</label></br>
                                <a href="https://twitter.com/intent/tweet?text={{urlencode(renderMessage($message->deputyMessage,$profile))}}&url={{url(route('perfil',$profile->id))}}" class="twitter customer share"target="_blank"><i class="fa fa-twitter" aria-hidden="true" style="color:#1da1f2; font-size: 30px;"></i></a>
                                <a href=""><i class="fa fa-facebook-official shareBtn" aria-hidden="true" style="color:#00549f; font-size: 30px;"></i></a>
                            </div>
                        </div>
                        @endif

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
                                <th>Presidente</th>
                                <td>{{$profile->companies()->where('position',1)->count()}}</td>
                            </tr>
                            <tr>
                                <th>Gerente</th>
                                <td>{{$profile->companies()->where('position',2)->count()}}</td>
                            </tr>
                            <tr>
                                <th>Accionista</th>
                                <td>{{$profile->companies()->where('position',3)->count() }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="well-footer">
                        <div class="row">
                            <div class="col-md-4">
                                <a href ="{{$profile->urlCompanies}}" target="_blank"><button type="button" class="btn btn-dark">VER FUENTE</button>
                            </div>
                            <div class="col-md-4">
                                <a href ="{{$profile->fileCompanies}}" target="_blank"><button type="button" class="btn btn-dark">VER ARCHIVO</button>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4 share-transaprency">
                                <label style="color:#3780c2">Comparte</label></br>
                                <a href="https://twitter.com/intent/tweet?text={{urlencode(renderMessage($message->companiesMessage,$profile))}}&url={{url(route('perfil',$profile->id))}}" class="twitter customer share"target="_blank"><i class="fa fa-twitter" aria-hidden="true" style="color:#1da1f2; font-size: 30px;"></i></a>
                                <a href=""><i class="fa fa-facebook-official shareBtn" aria-hidden="true" style="color:#00549f; font-size: 30px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="well well-lg well-transparency transparencia-antecedentes">
                    <div class="well-title">
            <span class="well-card-title">ANTECEDENTES JUDICIALES<span>
                    </div>
                    <div class="well-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>ACTOR</label>
                                <table class="table" >
                                    <thead>
                                    <tr>
                                        <th>Tipo de juicio</th>
                                        <th>Cantidad</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($profile->judicials()->where('type',1)->get() as $judgment)
                                    <tr>
                                        <td style="text-align:left;">{{$judgment->judgmentType->name}}</td>
                                        <td style="text-align:center;">{{$judgment->number}}</td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <label>DEMANDADO</label>
                                <table class="table" >
                                    <thead>
                                    <tr>
                                        <th>Tipo de juicio</th>
                                        <th>Cantidad</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($profile->judicials()->where('type',2)->get() as $judgment)
                                    <tr>
                                        <td style="text-align:left;">{{$judgment->judgmentType->name}}</td>
                                        <td style="text-align:center;">{{$judgment->number}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="well-footer">
                        <div class="row">
                            <div class="col-md-2">
                                <a href ="{{$profile->urlJudicial}}" target="_blank"><button type="button" class="btn btn-dark">VER FUENTE</button>
                            </div>
                            <div class="col-md-2">
                                <a href ="{{$profile->fileJudicial}}" target="_blank"><button type="button" class="btn btn-dark">VER ARCHIVO</button>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4 share-transaprency">
                                <label style="color:#3780c2">Comparte</label></br>
                                <a href="https://twitter.com/intent/tweet?text={{urlencode(renderMessage($message->judicialMessage,$profile))}}&url={{url(route('perfil',$profile->id))}}" class="twitter customer share"target="_blank"><i class="fa fa-twitter" aria-hidden="true" style="color:#1da1f2; font-size: 30px;"></i></a>
                                <a href=""><i class="fa fa-facebook-official shareBtn" aria-hidden="true" style="color:#00549f; font-size: 30px;"></i></a>
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
              <span class="well-card-title">FORMACIÓN ACADÉMICA<span>
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
                                <th>Títulos de cuarto nivel</th>
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
                            <div class="col-md-4">
                                <a href ="{{$profile->urlStudy}}" target="_blank"><button type="button" class="btn btn-dark">VER FUENTE</button>
                            </div>
                            <div class="col-md-4">
                                <a href ="{{$profile->fileStudy}}" target="_blank"><button type="button" class="btn btn-dark">VER ARCHIVO</button>
                            </div>
                            <div class="col-md-4 share-transaprency">
                                <label style="color:#3780c2">Comparte</label></br>
                                <a href="https://twitter.com/intent/tweet?text={{urlencode(renderMessage($message->senecytMessage,$profile))}}&url={{url(route('perfil',$profile->id))}}" class="twitter customer share"target="_blank"><i class="fa fa-twitter" aria-hidden="true" style="color:#1da1f2; font-size: 30px;"></i></a>
                                <a href=""><i class="fa fa-facebook-official shareBtn" aria-hidden="true" style="color:#00549f; font-size: 30px;"></i></a>
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
                    <div class="row well-body" style="text-align:center">
                        No poseemos información
                        <!-- <table class="table table-vertical">
                          <col width="50%">
                          <col width="50%">
                          <tr>
                            <th>Procesos</th>
                            <td>{{$profile->comptroller->processes}}</td>
                          </tr>
                        </table> -->
                    </div>
                    <!-- <div class="well-footer">
                      <div class="row">
                        <div class="col-md-4">
                          <a href ="{{$profile->urlComptroller}}" target="_blank"><button type="button" class="btn btn-dark">VER FUENTE</button>
                        </div>
                        <div class="col-md-4">
                          <a href ="{{$profile->fileComptroller}}" target="_blank"><button type="button" class="btn btn-dark">VER ARCHIVO</button>
                        </div>
                          <div class="col-md-4 share-transaprency">
                            <label>Comparte</label></br>
                              <a href="https://twitter.com/intent/tweet?text={{urlencode(renderMessage($message->comptrollerMessage,$profile))}}&url={{url(route('perfil',$profile->id))}}" class="twitter customer share"target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                              <a href=""><i class="fa fa-facebook-official shareBtn" aria-hidden="true"></i></a>
                          </div>
                      </div>
                    </div> -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="well well-lg well-transparency transparencia-contraloria">
                    <div class="well-title">
              <span class="well-card-title">ANTECEDENTES PENALES<span>
                    </div>
                    <div class="row well-body">
                        <table class="table table-vertical">
                            <col width="50%">
                            <col width="50%">
                            <tr>
                                <th>Antecedentes Penales</th>
                                <td>{{getBooleanString($profile->hasPenals)}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="well-footer">
                        <div class="row">
                            <div class="col-md-4">
                                <a href ="{{$profile->urlPenal}}" target="_blank"><button type="button" class="btn btn-dark">VER FUENTE</button>
                            </div>
                            <div class="col-md-4">
                                <a href ="{{$profile->filePenal}}" target="_blank"><button type="button" class="btn btn-dark">VER ARCHIVO</button>
                            </div>
                            <div class="col-md-4 share-transaprency">
                                <label style="color:#3780c2">Comparte</label></br>
                                <a href="https://twitter.com/intent/tweet?text={{urlencode(renderMessage($message->penalMessage,$profile))}}&url={{url(route('perfil',$profile->id))}}" class="twitter customer share"target="_blank"><i class="fa fa-twitter" aria-hidden="true" style="color:#1da1f2; font-size: 30px;"></i></a>
                                <a href=""><i class="fa fa-facebook-official shareBtn" aria-hidden="true" style="color:#00549f; font-size: 30px;"></i></a>
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
<script>
    $(function() {
        $('.well').matchHeight();
    });
</script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '764287883709832',
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    $('.shareBtn').click(function(){
        FB.ui({
            method: 'share',
            display: 'popup',
            href: '{{url(route("perfil",$profile->id))}}',
            hashtag: "#RadiografíaPolítica#{{$profile->person->name.$profile->person->lastname}}"
        }, function(response){});
    });
</script>
<script>
    ;(function($){

        /**
         * jQuery function to prevent default anchor event and take the href * and the title to make a share popup
         *
         * @param  {[object]} e           [Mouse event]
         * @param  {[integer]} intWidth   [Popup width defalut 500]
         * @param  {[integer]} intHeight  [Popup height defalut 400]
         * @param  {[boolean]} blnResize  [Is popup resizeabel default true]
         */
        $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {

            // Prevent default anchor event
            e.preventDefault();

            // Set values for window
            intWidth = intWidth || '500';
            intHeight = intHeight || '400';
            strResize = (blnResize ? 'yes' : 'no');

            // Set title and open popup with focus on it
            var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
                strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
                objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
        }

        /* ================================================== */

        $(document).ready(function ($) {
            $('.customer.share').on("click", function(e) {
                $(this).customerPopup(e);
            });
        });

    }(jQuery));
</script>

<script>
    $('.blink_me').click(function(){
        $(this).removeClass('blink_me');
    });
</script>
@endsection
