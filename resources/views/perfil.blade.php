@extends('layouts.app')

@section('content')
<div class="container">
  <section>
    <div class="row">
      <div class="col-md-12 title">
        <h3>DETALLE DE PERFIL </h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h4>Lenin Moreno</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
          <img src="/img/perfiles/lenin-300.jpg" class="img-responsive" />
      </div>
      <div class="col-md-6">
        <div class="row profile-description">
          <p>Rosita Andrea Espinosa Fernandez, canidata a la Asamblea Nacional por la provincia de Cotopaxi.</p>
          <p>El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.</p>
        </div>
        <div class="row">
          <button type="button" class="btn btn-dark">Descargar curriculum</button>
        </div>
        <div class="row">
            <button type="button" class="btn btn-dark">Descargar Plan de gobierno</button>
        </div>
        <div class="row">
          <b>Redes sociales</b>
        </div>
        <div class="row profile-socials">
          <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
        </div>
      </div>
      <div class="col-md-offset-1 col-md-2">
        <div class="row" style="text-align: center;">
          <label>Afiliación Actual:</label>
        </div>
        <div class="row" style="text-align:center;">
          <img src="/img/political-parties/35-pais.png" />
        </div>
        <br>
        <div class="row" style="text-align: center;">
          <label>Binomio:</label>
        </div>
        <div class="row" style="text-align:center;">
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
      <div class="timeline">
        <h4>VIDA PÚBLICA</h4>
        <div id="public-wrapper" class="events-wrapper">
          <div class="events">
            <ol>
			        <li><a href="#0" data-date="01/01/0001" class="selected">1998</a></li>
              <li><a href="#0" data-date="01/01/0002">1999</a></li>
              <li><a href="#0" data-date="01/01/0003">2002</a></li>
              <li><a href="#0" data-date="01/01/0004">2003</a></li>
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
  	<div class="timeline">
        <h4>VIDA PRIVADA</h4>
  		<div id="private-wrapper" class="events-wrapper">
  			<div class="events">
  				<ol>
  					<li><a href="#0" data-date="01/01/1001">1977</a></li>
  					<li><a href="#0" data-date="01/01/1002">1980</a></li>
  					<li><a href="#0" data-date="01/01/1003">1984</a></li>
  					<li><a href="#0" data-date="01/01/1004">1987</a></li>
  					<li><a href="#0" data-date="01/01/1005">1989</a></li>
					<li><a href="#0" data-date="01/01/1006">1989</a></li>
  					<li><a href="#0" data-date="01/01/1007">1993</a></li>
  					<li><a href="#0" data-date="01/01/1008">1994</a></li>
  					<li><a href="#0" data-date="01/01/1009">1994</a></li>
  					<li><a href="#0" data-date="01/01/1010">2008</a></li>
  					<li><a href="#0" data-date="01/01/1011">2010</a></li>
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
    <div class="timeline">
        <h4>VIDA POLÍTICA</h4>
      <div id="politician-wrapper" class="events-wrapper">
        <div class="events">
          <ol>
            <li><a href="#0" data-date="01/01/2001">2006</a></li>
  			<li><a href="#0" data-date="01/01/2002">2011</a></li>
  			<li><a href="#0" data-date="01/01/2003">2013</a></li>
  			<li><a href="#0" data-date="01/01/2004">2014</a></li>
  			<li><a href="#0" data-date="01/01/2005">2016</a></li>
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

  			<li class="selected" data-date="01/01/0001">
  				<h4>Vida Pública</h4>
  				<em>1998 - 1999</em>
  				<p>
  					Gobernador del Guayas (gobierno de Jamil Mahuad)
  				</p>
  			</li>

  			<li data-date="01/01/0002">
  				<h4>Vida Pública</h4>
  				<em>1999</em>
  				<p>
  					Superministro de Economía y Energía (gobierno de Jamil Mahuad)
  				</p>
  			</li>

  			<li data-date="01/01/0003">
  				<h4>Vida Pública</h4>
  				<em>2002 - 2007</em>
  				<p>
  					Presidente de la Fundación Terminal Terrestre y encargado de la reconstrucción del Terminal Terrestre de Guayaquil.
  				</p>
  			</li>

  			<li data-date="01/01/0004">
  				<h4>Vida Pública</h4>
  				<em>2003</em>
  				<p>
  					Embajador Itinerante de Ecuador de relaciones con EEUU (gobierno de Lucio Gutierrez)
  				</p>
  			</li>

			<!-- FIN VIDA PUBLICA -->

			<!-- INICIO VIDA PRIVADA -->
			<li data-date="01/01/1001">
  				<h4>Vida Privada</h4>
  				<em>1977-1980 </em>
  				<p>
  					Gerente de ProCrédito.
  				</p>
  			</li>

  			<li data-date="01/01/1002">
  				<h4>Vida Privada</h4>
  				<em>1980-1989</em>
  				<p>
  					Presidente ejecutivo de Finansur.
  				</p>
  			</li>

  			<li data-date="01/01/1003">
  				<h4>Vida Privada</h4>
  				<em>1984</em>
  				<p>
  					Vicepresidente de la filial nacional de Coca-Cola, empresa a la que rehabilitó.
  				</p>
  			</li>

  			<li data-date="01/01/1004">
  				<h4>Vida Privada</h4>
  				<em>1987-1988</em>
  				<p>
  					Presidente de la Asociación de Compañías Financieras del Ecuador.
  				</p>
  			</li>
			<li data-date="01/01/1005">
  				<h4>Vida Privada</h4>
  				<em>1989</em>
  				<p>
  					Vicepresidencia Ejecutiva y la Gerencia General del Banco de Guayaquil.
  				</p>
  			</li>

  			<li data-date="01/01/1006">
  				<h4>Vida Privada</h4>
  				<em>1989-1999</em>
  				<p>
  					Adquisición de la empresa Mavesa, representante de Hino.
  				</p>
  			</li>

  			<li data-date="01/01/1007">
  				<h4>Vida Privada</h4>
  				<em>1993-1997</em>
  				<p>
  					Presidente de la Asociación de Bancos Privados del Ecuador.
  				</p>
  			</li>

  			<li data-date="01/01/1008">
  				<h4>Vida Privada</h4>
  				<em>1994</em>
  				<p>
  					Vocal en la Junta Monetaria en representación de los bancos privados nacionales.
  				</p>
  			</li>
			<li data-date="01/01/1009">
  				<h4>Vida Privada</h4>
  				<em>1994-2012</em>
  				<p>
  					Presidente Ejecutivo del Banco de Guayaquil.
  				</p>
  			</li>

  			<li data-date="01/01/1010">
  				<h4>Vida Privada</h4>
  				<em>2008</em>
  				<p>
  					Funda “Banco del Barrio”.
  				</p>
  			</li>

  			<li data-date="01/01/1011">
  				<h4>Vida Privada</h4>
  				<em>2010</em>
  				<p>
  					El BID reconoce el “Banco del Barrio” como el mayor proyecto de bancarización de Latinoamérica.
  				</p>
  			</li>
			<!-- FIN VIDA PRIVADA -->

			<!-- INICIO VIDA POLITICA -->
			<li data-date="01/01/2001">
  				<h4>Vida Privada</h4>
  				<em>2006</em>
  				<p>
  					Miembro del movimiento político liberal UNO.
  				</p>
  			</li>

  			<li data-date="01/01/2002">
  				<h4>Vida Privada</h4>
  				<em>2011</em>
  				<p>
  					Fundador del movimiento político CREO.
  				</p>
  			</li>

  			<li data-date="01/01/2003">
  				<h4>Vida Privada</h4>
  				<em>2013</em>
  				<p>
  					Candidato a Presidente por el movimiento CREO.
  				</p>
  			</li>

  			<li data-date="01/01/2004">
  				<h4>Vida Privada</h4>
  				<em>2014</em>
  				<p>
  					Conformó la coalición Compromiso Ecuador.
  				</p>
  			</li>
			<li data-date="01/01/2005">
  				<h4>Vida Privada</h4>
  				<em>2016</em>
  				<p>
  					Candidato presidencial para las Elecciones 2017 por el movimiento CREO.
  				</p>
  			</li>
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
        <div class="well well-lg well-transparency">
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
                  <tr>
                    <td>2015</td>
                    <td>$0,00</td>
                  </tr>
				 <tr>
                    <td>2014</td>
                    <td>$4.884,96</td>
                  </tr>
				 <tr>
                    <td>2013</td>
                    <td>$27.980,62</td>
                  </tr>
				 <tr>
                    <td>2012</td>
                    <td>$2.508,52</td>
                  </tr>
				 <tr>
                    <td>2011</td>
                    <td>$2.224,81</td>
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
                  <tr>
                    <td>2016</td>
                    <td>$1.446,32</td>
                  </tr>
				 <tr>
                    <td>2015</td>
                    <td>$1.645,98</td>
                  </tr>
				 <tr>
                    <td>2014</td>
                    <td>$2.099,59</td>
                  </tr>
				 <tr>
                    <td>2013</td>
                    <td>$465,59</td>
                  </tr>
				 <tr>
                    <td>2012</td>
                    <td>$241,42</td>
                  </tr>
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
        <div class="well well-lg well-transparency">
          <div class="well-title">
            <span class="well-card-title">DECLARACION PATRIMONIAL<span>
          </div>
          <div class="well-body">
            <div class="row patrimonial-declaration-icons">
              <div class="col-md-3">
                <div class="img-responsive">
                  <img src="/img/ico-vivienda.png">
                </div>
                <span>2</span>
              </div>
              <div class="col-md-3">
                <div class="img-responsive">
                  <img src="/img/ico-auto.png">
                </div>
                <span>3</span>
              </div>
              <div class="col-md-3">
                <div class="img-responsive">
                  <img src="/img/ico-dinero.png">
                </div>
                <span>$80.000,00</span>
              </div>
              <div class="col-md-3">
                <div class="img-responsive">
                  <img src="/img/ico-industria.png">
                </div>
                <span>0</span>
              </div>
            </div>
            <div class="row">
            <table class="table">
              <tr>
                <th>Fecha de declaración</th>
                <td>29/04/2013</td>
                <td>29/04/2013</td>
              </tr>
              <tr>
                <th>Activos</th>
                <td>$7.726,00</td>
                <td>$7.726,00</td>
              </tr>
              <tr>
                <th>Pasivos</th>
                <td>$7.726,00</td>
                <td>$7.726,00</td>
              </tr>
              <tr>
                <th>Patrimonio</th>
                <td>$7.726,00</td>
                <td>$7.726,00</td>
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
        <div class="well well-lg well-transparency">
          <div class="well-title">
            <span class="well-card-title">SUPERINTENDENCIA<span>
          </div>
          <div class="row well-body">
            <table class="table table-vertical">
              <col width="50%">
              <col width="50%">
              <tr>
                <th>Gerente</th>
                <td>0</td>
              </tr>
              <tr>
                <th>Presidente</th>
                <td>2</td>
              </tr>
              <tr>
                <th>Accionista</th>
                <td>1</td>
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
        <div class="well well-lg well-transparency">
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
                      <th>Tema</th>
                      <th>Cantidad de juicios</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Inquilinato</td>
                      <td>1</td>
                    </tr>
				   <tr>
                      <td>Penal</td>
                      <td>1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-6">
                <label>DEMANDADO</label>
                <table class="table" style="text-align:center;">
                  <thead>
                    <tr>
                      <th>Tema</th>
                      <th>Cantidad de juicios</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Civil</td>
                      <td>3</td>
                    </tr>
				   <tr>
                      <td>Laboral</td>
                      <td>1</td>
                    </tr>
                    <tr>
                      <td>Constitucional</td>
                      <td>2</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label>ANTECEDENTES PENALES:&nbsp;&nbsp;</label> <label>SI - 4</label>
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
        <div class="col-md-6">
          <div class="well well-lg well-transparency">
            <div class="well-title">
              <span class="well-card-title">SENESCYT<span>
            </div>
            <div class="row well-body">
              <table class="table table-vertical">
                <col width="50%">
                <col width="50%">
                <tr>
                  <th>Tercer Nivel</th>
                  <td>Licenciado en Administración Pública</td>
                </tr>
                <tr>
                  <th>Maestría</th>
                  <td>0</td>
                </tr>
                <tr>
                  <th>PhD</th>
                  <td>0</td>
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
        <div class="col-md-6">
          <div class="well well-lg well-transparency">
            <div class="well-title">
              <span class="well-card-title">CONTRALORÍA<span>
            </div>
            <div class="row well-body">
              <table class="table table-vertical">
                <col width="50%">
                <col width="50%">
                <tr>
                  <th>Procesos</th>
                  <td>0</td>
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
