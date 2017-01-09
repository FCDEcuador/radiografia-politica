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
        <img src="/img/perfiles/lenin-300.jpg" width="250px" />
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
              <li><a href="#0" data-date="16/01/2014" class="selected">16 Jan</a></li>
              <li><a href="#0" data-date="09/07/2014">09 Jul</a></li>
              <li><a href="#0" data-date="30/08/2014">30 Aug</a></li>
              <li><a href="#0" data-date="15/09/2014">15 Sep</a></li>
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
  					<li><a href="#0" data-date="16/01/2014">16 Jan</a></li>
  					<li><a href="#0" data-date="28/02/2014">28 Feb</a></li>
  					<li><a href="#0" data-date="20/04/2014">20 Mar</a></li>
  					<li><a href="#0" data-date="19/01/2015">29 Jan</a></li>
  					<li><a href="#0" data-date="03/03/2015">3 Mar</a></li>
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
            <li><a href="#0" data-date="16/01/2014">16 Jan</a></li>
            <li><a href="#0" data-date="28/02/2014">28 Feb</a></li>
            <li><a href="#0" data-date="20/04/2014">20 Mar</a></li>
            <li><a href="#0" data-date="20/05/2014">20 May</a></li>
            <li><a href="#0" data-date="09/07/2014">09 Jul</a></li>
            <li><a href="#0" data-date="30/08/2014">30 Aug</a></li>
            <li><a href="#0" data-date="15/09/2014">15 Sep</a></li>
            <li><a href="#0" data-date="01/11/2014">01 Nov</a></li>
            <li><a href="#0" data-date="10/12/2014">10 Dec</a></li>
            <li><a href="#0" data-date="19/01/2015">29 Jan</a></li>
            <li><a href="#0" data-date="03/03/2015">3 Mar</a></li>
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
  			<li class="selected" data-date="16/01/2014">
  				<h2>Horizontal Timeline</h2>
  				<em>January 16th, 2014</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>

  			<li data-date="28/02/2014">
  				<h2>Event title here</h2>
  				<em>February 28th, 2014</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>

  			<li data-date="20/04/2014">
  				<h2>Event title here</h2>
  				<em>March 20th, 2014</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>

  			<li data-date="20/05/2014">
  				<h2>Event title here</h2>
  				<em>May 20th, 2014</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>

  			<li data-date="09/07/2014">
  				<h2>Event title here</h2>
  				<em>July 9th, 2014</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>

  			<li data-date="30/08/2014">
  				<h2>Event title here</h2>
  				<em>August 30th, 2014</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>

  			<li data-date="15/09/2014">
  				<h2>Event title here</h2>
  				<em>September 15th, 2014</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>

  			<li data-date="01/11/2014">
  				<h2>Event title here</h2>
  				<em>November 1st, 2014</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>

  			<li data-date="10/12/2014">
  				<h2>Event title here</h2>
  				<em>December 10th, 2014</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>

  			<li data-date="19/01/2015">
  				<h2>Event title here</h2>
  				<em>January 19th, 2015</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>

  			<li data-date="03/03/2015">
  				<h2>Event title here</h2>
  				<em>March 3rd, 2015</em>
  				<p>
  					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
  				</p>
  			</li>
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
                    <td>2018</td>
                    <td>$7.726,00</td>
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
                    <td>2018</td>
                    <td>$7.726,00</td>
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
                <span>5</span>
              </div>
              <div class="col-md-3">
                <div class="img-responsive">
                  <img src="/img/ico-auto.png">
                </div>
                <span>5</span>
              </div>
              <div class="col-md-3">
                <div class="img-responsive">
                  <img src="/img/ico-dinero.png">
                </div>
                <span>5</span>
              </div>
              <div class="col-md-3">
                <div class="img-responsive">
                  <img src="/img/ico-industria.png">
                </div>
                <span>5</span>
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
                <td>1</td>
              </tr>
              <tr>
                <th>Presidente</th>
                <td>2</td>
              </tr>
              <tr>
                <th>Accionista</th>
                <td>0</td>
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
                      <td>Civil</td>
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
                      <td>1</td>
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
                  <td>1</td>
                </tr>
                <tr>
                  <th>Maestría</th>
                  <td>2</td>
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
