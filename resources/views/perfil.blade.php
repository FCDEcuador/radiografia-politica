@extends('layouts.app')

@section('content')
<div class="container">
  <section>
    <div class="row">
      <div class="col-md-12 title">
        <h4>DETALLE DE PERFIL </h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h5>Rosita Espinosa</h5>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <img src="/img/lenin-moreno.jpg" width="200px" height="150px" />
      </div>
      <div class="col-md-6">
        <div class="row">
          <p>Rosita Andrea Espinosa Fernandez, canidata a la Asamblea Nacional por la provincia de Cotopaxi.</p>
          <p>El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.</p>
        </div>
        <div class="row">
          <button type="button" class="btn btn-dark">Descargar curriculum</button>
        </div>
        <br>
        <div class="row">
            <button type="button" class="btn btn-dark">Plan de gobierno</button>
        </div>
        <br>
        <div class="row">
          Redes sociales
        </div>
      </div>
      <div class="col-md-offset-1 col-md-2">
        <div class="row">
          <label>Afiliación Actual:</label>
        </div>
        <div class="row" style="text-align:center;">
          <img src="/img/alianza-pais.jpg" />
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="row">
      <div class="col-md-12 title">
        <h4>LÍNEA DE TIEMPO </h4>
      </div>
    </div>
    <section class="cd-horizontal-timeline">
  	<div class="timeline">
  		<div class="events-wrapper">
  			<div class="events">
  				<ol>
  					<li><a href="#0" data-date="16/01/2014" class="selected">16 Jan</a></li>
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
        <h4>TRANSPARENCIA </h4>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-6">
        <div class="well well-lg">
          <div class="well-title">
            <span class="well-card-title">SRI<span>
          </div>
          <div class="row well-body">
            <div class="col-md-6">
              <table class="table sri-table">
                <thead>
                  <tr>
                    <th>Año</th>
                    <th>Valor impuesto a la Renta</th>
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
              <table class="table sri-table">
                <thead>
                  <tr>
                    <th>Año Fiscal</th>
                    <th>Valor impuesto de salida de divisas</th>
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
            <button type="button" class="btn btn-dark">VER FUENTE</button>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="well well-lg">
          <div class="well-title">
            <span class="well-card-title">DECLARACION PATRIMONIAL<span>
          </div>
          <div class="row well-body">
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
          <div class="well-footer">
            <button type="button" class="btn btn-dark">VER FUENTE</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-md-4">
        <div class="well well-lg">
          <div class="well-title">
            <span class="well-card-title">SUPERINTENDENCIA<span>
          </div>
          <div class="row well-body">
            No se encuentran registros de relación a empresas
          </div>
          <div class="well-footer">
            <button type="button" class="btn btn-dark">VER FUENTE</button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="well well-lg">
          <div class="well-title">
            <span class="well-card-title">ANTECEDENTES JUDICIALES<span>
          </div>
          <div class="row well-body">
            No se registran antecedentes
          </div>
          <div class="well-footer">
            <button type="button" class="btn btn-dark">VER FUENTE</button>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="well well-lg">
          <div class="well-title">
            <span class="well-card-title">ANTECEDENTES PENALES<span>
          </div>
          <div class="row well-body">
            No se registran antecedentes
          </div>
          <div class="well-footer">
            <button type="button" class="btn btn-dark">VER FUENTE</button>
          </div>
        </div>
      </div>
    </div>
      <!-- end row -->
      <div class="row">
        <div class="col-md-6">
          <div class="well well-lg">
            <div class="well-title">
              <span class="well-card-title">SENESCYT<span>
            </div>
            <div class="row well-body">
              No hay datos
            </div>
            <div class="well-footer">
              <button type="button" class="btn btn-dark">VER FUENTE</button>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="well well-lg">
            <div class="well-title">
              <span class="well-card-title">CONTRALORÍA<span>
            </div>
            <div class="row well-body">
              No hay datos
            </div>
            <div class="well-footer">
              <button type="button" class="btn btn-dark">VER FUENTE</button>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection
