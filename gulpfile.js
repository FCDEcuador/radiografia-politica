const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');


// Set your Bower target directory below.
var bowerDir = '../bower';

// Helper function.
function bower(pkg, path) {
    return [bowerDir, pkg, path].join('/');
}

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
      .webpack('app.js')
      .sass('admin.scss')
      .webpack('admin.js');

      mix.styles([
        bower('AdminLTE','bootstrap/css/bootstrap.min.css'),
        bower('AdminLTE','plugins/jvectormap/jquery-jvectormap-1.2.2.css'),
        bower('AdminLTE','dist/css/AdminLTE.min.css'),
        bower('AdminLTE','dist/css/skins/_all-skins.min.css'),
        bower('sweetalert','dist/sweetalert.css')
      ],'public/css/libs.css');

      mix.scripts([
        bower('AdminLTE','plugins/jQuery/jquery-2.2.3.min.js'),
        bower('AdminLTE','bootstrap/js/bootstrap.min.js'),
        bower('AdminLTE','plugins/fastclick/fastclick.js'),
        bower('AdminLTE','dist/js/app.min.js'),
        bower('AdminLTE','plugins/sparkline/jquery.sparkline.min.js'),
        bower('AdminLTE','plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'),
        bower('AdminLTE','plugins/jvectormap/jquery-jvectormap-world-mill-en.js'),
        bower('AdminLTE','plugins/slimScroll/jquery.slimscroll.min.js'),
        bower('AdminLTE','plugins/chartjs/Chart.min.js'),
        bower('sweetalert','dist/sweetalert.min.js')
      ],'public/js/libs.js');
});
