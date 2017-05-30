@extends('layouts.app')

@section('content')

<div class="container">
  <section>
    <div class="row">
      <div class="col-md-12 title">
        <h3>¿QUIÉNES SOMOS? </h3>
      </div>
    </div>
    <br>
    <div class="row" style="text-align:justify;">
      <div class="col-md-12">
		<p>Radiografía Política es una iniciativa de Fundación Ciudadanía y Desarrollo que pone a disposición de la ciudadanía información patrimonial, académica, tributaria, de relación con compañías y antecedentes penales y judiciales de funcionarios públicos y candidatos a cargos de elección popular con el fin de promover el voto informado, la fiscalización a los actos del poder público y el control social en Ecuador.
            </p>
            <p>La información presentada en cada perfil es pública, de fuentes oficiales, pero es sistematizada y presentada de una manera amigable para que los ciudadanos puedan explorarla, descargarla en datos abiertos y compartirla en sus redes sociales.
            </p>
            <p>Esta información es actualizada mensual, cuatrimestral, o anualmente para garantizar su veracidad. Puedes conocer nuestra metodología
              <a href="https://docs.google.com/document/d/1K8F4nEJbyr6bW6B4PB9I1lUHoxav7exRQ1xXkIEwgDo/edit" target="_blank">aquí</a>.</p>
              <p>La Fundación Ciudadanía y Desarrollo es una organización de la sociedad civil que nace en el año 2009 con el objetivo de formar líderes sociales, éticos y transparentes para potenciar la ciudadanía y su desarrollo. Conoce otras iniciativas:
              </p>
      </div>
    </div>
  </section>
</div>
<div class="container">
  <section>

    <br>

    <div class="row" style="text-align:justify;">
      <div class="col-md-6">
          <div class="row">
            <div class="col-md-6" style="text-align: center;">
              <a href="http://www.observatoriolegislativo.ec/" target="_blank"><img src="{{asset('img/observatorio-color.jpeg')}}" style="height: 80px;"/></a>
            </div>
            <div class="col-md-6" style="text-align: center;">
              <a href="https://www.espaciojoven.ec/" target="_blank"><img src="{{asset('img/logo-espacio-joven.png')}}" style="height: 80px;"/></a>
            </div>
          </div>
          <div class="row" style="margin-top:20px;">
            <div class="col-md-6" style="text-align: center;">
              <a href="http://decretazo.ec/" target="_blank"><img src="{{asset('img/logo-decretazo.png')}}" style="height: 80px;"/></a>
            </div>
            <div class="col-md-6" style="text-align: center;">
              <a href="http://queremossaber.ec" target="_blank"><img src="{{asset('img/queremossaber.png')}}" style="height: 80px;"/></a>
            </div>
          </div>

        </div>
        <div class="col-md-6">
            <iframe width="420" height="315"
src="https://www.youtube.com/embed/h4bt_r6Zl1c">
</iframe>
      </div>
    </section>
  </div>

  @endsection
