<!DOCTYPE html>
<html lang="es" ng-app="politics">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff ">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff ">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('metas')
    <!-- Styles -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />
    <!-- Scripts -->
    <script>
        window.Laravel =
        <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]);
        ?>
    </script>
</head>
<body>
    <div id="app">
      <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <!-- <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{URL::to('img/radiografia-logo.png')}}" />
                    </a> -->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="{{URL::to(route('home'))}}">INICIO</a></li>
                      <!--<li><a href="{{URL::to(route('home'))}}/#profile">CANDIDATOS</a></li>-->
                      <!--<li><a href="{{URL::to(route('home'))}}/#generalComptroller">FUNCIONARIOS PÚBLICOS</a></li>-->
                      <li><a href="{{URL::to('quienes-somos')}}">QUIÉNES SOMOS</a></li>
                      <li><a href="{{URL::to('sumate-a-la-iniciativa')}}">SÚMATE A LA INICIATIVA</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="content">
          @yield('content')
        </div>
      </div>

        <div id="footer">
          <div class="container">
          <div class="row">

            <div id="footer-sponsors" class="col-sm-12 col-md-12 footer-section-row">
              <div class="row" style="margin-right: 10px;text-align:center;font-size:20px">
              Una iniciativa de <a href="http://www.ciudadaniaydesarrollo.org/" target="_blank"><img src="{{asset('img/fcd-logo.png')}}"  style="height: 80px;margin-right:15px" class="footer-sponsor-img"/></a>Con el apoyo de <a href="http://queremossaber.ec/portal/" target="_blank"><img src="{{asset('img/queremossaber.png')}}" style="height: 60px;" class="footer-sponsor-img"/></a>
              <a href="http://www.observatoriolegislativo.ec/" target="_blank"><img src="{{asset('img/observatorio.png')}}" style="height: 50px;" class="footer-sponsor-img"/></a>
              <a href="http://www.observatoriolegislativo.ec/" target="_blank"><img src="{{asset('img/logo-decretazo.png')}}" style="height: 50px;" class="footer-sponsor-img"/></a>
              <a href="http://www.observatoriolegislativo.ec/" target="_blank"><img src="{{asset('img/logo-espacio-joven.png')}}" style="height: 50px;" class="footer-sponsor-img"/></a>

            </div>
              <div class="row" style="margin-right: 10px;">


            </div>
          </div>
          </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
    	@yield('scripts')
      <script>
      $(function() {
          $('.footer-section-row').matchHeight();
      });
      </script>
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-91968402-1', 'auto');
        ga('send', 'pageview');

      </script>
</body>
</html>
