<!DOCTYPE html>
<html lang="es" ng-app="politics">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{URL::to('img/radiografia-logo.png')}}"/>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/') }}">INICIO</a></li>
                        <li><a href="{{ url('/candidatos') }}">CANDIDATOS</a></li>
                        <li><a href="{{ url('/funcionarios') }}">FUNCIONARIOS PÚBLICOS</a></li>
                        <li><a href="{{ url('/contacto') }}">CONTACTO</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="content">
            @yield('content')
        </div>
    </div>

    <div id="footer" class="container-fluid">
        <div class="row">
            <div id="footer-site-map" class="col-sm-12 col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="footer-title-head">
                                Nosotros
                            </div>
                        </div>
                        <div class="row">
                            <div class="footer-item">
                                <a href="{{URL::to('quienes-somos')}}">Quienes Somos</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="footer-item">
                                <a href="{{URL::to('sumate-a-la-iniciativa')}}">Súmate a la iniciativa</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="footer-title-head">
                                Elecciones 2017
                            </div>
                        </div>
                        <div class="row">
                            <div class="footer-item">
                                <a href="{{URL::to('candidatos-presidencia')}}">Candidatos Presidencia</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="footer-item">
                                <a href="{{URL::to('informacion-sobre-las-elecciones')}}">Información sobre las
                                    elecciones</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="footer-title-head">
                                Perfiles
                            </div>
                        </div>
                        <div class="row">
                            <div class="footer-item">
                                <a href="{{URL::to('funcionarios-publicos')}}">Funcionarios Públicos</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="footer-item">
                                <a href="{{URL::to('buscador')}}">Buscador</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
            <div id="footer-sponsors" class="col-sm-12 col-md-4">
                <div class="row">
                    Auspiciado por:
                </div>
                <div class="row">
                    <div class="col-sm-12 col-sm-offset-0 col-md-offset-6 col-md-6">
                        <img src="{{asset('img/universidad-hemisferios-logo.png')}}" style="height: 32px;"
                             class="footer-sponsor-img"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-sm-offset-0 col-md-offset-6 col-md-3">
                        <img src="{{asset('img/udla-logo-footer.png')}}" class="footer-sponsor-img"/>
                    </div>
                    <div class="col-sm-12 col-sm-offset-0 col-md-3">
                        <img src="{{asset('img/fcd-logo.png')}}" style="height: 32px;" class="footer-sponsor-img"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{asset('js/app.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.accordion-tabs-minimal').each(function(index) {
            $(this).children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
        });
        $('.accordion-tabs-minimal').on('click', 'li > a.tab-link', function(event) {
            if (!$(this).hasClass('is-active')) {
                event.preventDefault();
                var accordionTabs = $(this).closest('.accordion-tabs-minimal');
                accordionTabs.find('.is-open').removeClass('is-open').hide();

                $(this).next().toggleClass('is-open').toggle();
                accordionTabs.find('.is-active').removeClass('is-active');
                $(this).addClass('is-active');
            } else {
                event.preventDefault();
            }
        });
    });


</script>
</body>
</html>
