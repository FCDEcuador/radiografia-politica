<!DOCTYPE html>
<html lang="es" ng-app="admin-politics">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Styles -->
    <link href="{{asset('css/libs.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" type="text/css" />
    <!-- Scripts -->
    <script>
        window.Laravel =
        <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]);
        ?>
    </script>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div id="app" class="wrapper" ng-controller="AdminController">

    <header class="main-header">

      <!-- Logo -->
      <a href="{{url('/administration/')}}" class="logo">
          <img src="{{URL::to('img/radiografia-logo.png')}}" height="40px" />
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Notifications: style can be found in dropdown.less
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                        page and may cause design problems
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 new members joined
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> You changed your username
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>  -->

            <!-- Authentication Links -->
            @if (Auth::guest())
               <li><a href="{{ url('/login') }}">Login</a></li>
               <li><a href="{{ url('/register') }}">Register</a></li>
             @else
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   {{ Auth::user()->name }} <span class="caret"></span>
                 </a>

                 <ul class="dropdown-menu" role="menu">
                     <li>
                       <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                             Logout
                       </a>

                      <form id="logout-form" action="{{ url('/administration/logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
                       </form>
                    </li>
               </ul>
             </li>
            @endif
          </ul>
        </div>

      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left info">
            <p> {{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">ADMINISTRACIÓN</li>
          <li><a href="{{url('/administration/')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Usuarios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/user')}}"><i class="fa fa-circle-o"></i> Ver</a></li>
              <li><a href={{url('administration/user/create')}}><i class="fa fa-circle-o"></i> Nuevo</a></li>
            </ul>
          </li>
          <li class="header">SITIO</li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-gavel"></i> <span>Administrar Banner</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/banner/edit')}}"><i class="fa fa-circle-o"></i> Editar</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-gavel"></i> <span>Tipos Delitos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/judgment_type')}}"><i class="fa fa-circle-o"></i> Ver</a></li>
              <li><a href={{url('administration/judgment_type/create')}}><i class="fa fa-circle-o"></i> Nuevo</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-flag"></i> <span>Partido Político</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/political_party')}}"><i class="fa fa-circle-o"></i> Ver</a></li>
              <li><a href={{url('administration/political_party/create')}}><i class="fa fa-circle-o"></i> Nuevo</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-suitcase"></i> <span>Cargos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/position')}}"><i class="fa fa-circle-o"></i> Ver</a></li>
              <li><a href={{url('administration/position/create')}}><i class="fa fa-circle-o"></i> Nuevo</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Candidatos Presidentes</span>
              <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/presidencial-candidates/published')}}"><i class="fa fa-circle-o"></i> Publicados</a></li>
              <li><a href={{url('administration/presidencial-candidates/drafts')}}><i class="fa fa-circle-o"></i> Borradores    <span class="pull-right-container"> <small class="label pull-right bg-red"><% data.draft.binomialCandidates %></small></span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Candidatos Asambleistas</span>
              <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/asambleistas-candidates/published')}}"><i class="fa fa-circle-o"></i> Publicados</a></li>
              <li><a href={{url('administration/asambleistas-candidates/drafts')}}><i class="fa fa-circle-o"></i> Borradores    <span class="pull-right-container"> <small class="label pull-right bg-red"><% data.draft.deputyCandidates %></small></span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Asambleistas</span>
              <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/asambleistas/published')}}"><i class="fa fa-circle-o"></i> Publicados</a></li>
              <li><a href={{url('administration/asambleistas/drafts')}}><i class="fa fa-circle-o"></i> Borradores    <span class="pull-right-container"> <small class="label pull-right bg-red"><% data.draft.deputys %></small></span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Candidatos Contralor</span>
              <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/generalComptroller/published')}}"><i class="fa fa-circle-o"></i> Publicados</a></li>
              <li><a href={{url('administration/generalComptroller/drafts')}}><i class="fa fa-circle-o"></i> Borradores    <span class="pull-right-container"> <small class="label pull-right bg-red"><% data.draft.deputys %></small></span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Candidatos Defensor</span>
              <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/ombudsman/published')}}"><i class="fa fa-circle-o"></i> Publicados</a></li>
              <li><a href={{url('administration/ombudsman/drafts')}}><i class="fa fa-circle-o"></i> Borradores    <span class="pull-right-container"> <small class="label pull-right bg-red"><% data.draft.deputys %></small></span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Funcionarios Públicos</span>
              <span class="pull-right-container">
                <!--<small class="label pull-right bg-green">new</small> -->
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/public-servants/published')}}"><i class="fa fa-circle-o"></i> Publicados</a></li>
              <li><a href={{url('administration/public-servants/drafts')}}><i class="fa fa-circle-o"></i> Borradores    <span class="pull-right-container"> <small class="label pull-right bg-red"><% data.draft.publicServants %></small></span></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Perfiles</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/profile')}}"><i class="fa fa-circle-o"></i> Ver</a></li>
              <li><a href={{url('administration/profile/create')}}><i class="fa fa-circle-o"></i> Nuevo</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-envelope"></i> <span>Mensajes</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('administration/message/edit')}}"><i class="fa fa-circle-o"></i> editar</a></li>
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @yield('content')
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 0.1.0
      </div>
      <strong>Copyright &copy; 2013-{{date('Y')}} <a href="https://www.umpacto.com">Umpacto Soluciones Cia.Ltda.</a></strong> Todos los
      derechos reservados.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->

        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
<script src="{{asset('js/libs.js')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>
@include('sweet::alert')
	@yield('scripts')
</body>
</html>
