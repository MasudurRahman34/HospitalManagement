const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');
mix.styles([
    //vendor
    'public/dashboard/vendor/bootstrap/css/bootstrap.min.css',
    'public/dashboard/vendor/themify-icons/themify-icons.css',
    'public/dashboard/vendor/font-awesome/css/font-awesome.min.css',
    'public/dashboard/vendor/animate.css/animate.min.css',
    'public/dashboard/vendor/jscrollpane/jquery.jscrollpane.css',
    'public/dashboard/vendor/waves/waves.min.css',
    'public/dashboard/vendor/chartist/chartist.min.css',
    'public/dashboard/vendor/switchery/dist/switchery.min.css',
    'public/dashboard/vendor/morris/morris.css',
    'public/dashboard/vendor/jvectormap/jquery-jvectormap-2.0.3.css',
    'public/dashboard/vendor/sweetalert2/sweetalert2.min.css',
    'public/dashboard/vendor/toastr/toastr.min.css',
    'public/dashboard/vendor/select2/dist/css/select2.min.css',
    //datatable
    'public/dashboard/vendor/DataTables/css/dataTables.bootstrap4.min.css',
    'public/dashboard/vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css',
    'public/dashboard/vendor/DataTables/Buttons/css/buttons.dataTables.min.css',
    'public/dashboard/vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css',
    //core
    'public/dashboard/html/css/core.css'
], 'public/css/all.css').options({
    processCssUrls: false
 }).version();
 mix.copyDirectory('public/dashboard/vendor/font-awesome/fonts', 'public/fonts');
 mix.copyDirectory('public/dashboard/vendor/themify-icons/fonts', 'public/css/fonts');
 mix.copyDirectory('public/dashboard/html/img', 'public/img');


mix.scripts([
    'public/dashboard/vendor/jquery/jquery-1.12.3.min.js',
    'public/dashboard/vendor/tether/js/tether.min.js',
    'public/dashboard/vendor/bootstrap/js/bootstrap.min.js',
    'public/dashboard/vendor/detectmobilebrowser/detectmobilebrowser.js',
    'public/dashboard/vendor/jscrollpane/jquery.mousewheel.js',
    'public/dashboard/vendor/jscrollpane/mwheelIntent.js',
    'public/dashboard/vendor/jscrollpane/jquery.jscrollpane.min.js',
    'public/dashboard/vendor/waves/waves.min.js',
    'public/dashboard/vendor/chartist/chartist.min.js',
    'public/dashboard/vendor/switchery/dist/switchery.min.js',
    'public/dashboard/vendor/flot/jquery.flot.min.js',
    'public/dashboard/vendor/flot/jquery.flot.resize.min.js',
    'public/dashboard/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js',
    'public/dashboard/vendor/CurvedLines/curvedLines.js',
    'public/dashboard/vendor/TinyColor/tinycolor.js',
    'public/dashboard/vendor/sparkline/jquery.sparkline.min.js',
    'public/dashboard/vendor/raphael/raphael.min.js',
    'public/dashboard/vendor/morris/morris.min.js',
    'public/dashboard/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js',
    'public/dashboard/vendor/jvectormap/jquery-jvectormap-world-mill.js',
    'public/dashboard/vendor/sweetalert2/sweetalert2.min.js',
    'public/dashboard/vendor/toastr/toastr.min.js',
    'public/dashboard/vendor/select2/dist/js/select2.min.js',
    //datatables
    'public/dashboard/vendor/DataTables/js/jquery.dataTables.min.js',
    'public/dashboard/vendor/DataTables/js/dataTables.bootstrap4.min.js',
    'public/dashboard/vendor/DataTables/Responsive/js/dataTables.responsive.min.js',
    'public/dashboard/vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js',
    'public/dashboard/vendor/DataTables/Buttons/js/dataTables.buttons.min.js',
    'public/dashboard/vendor/DataTables/Buttons/js/buttons.bootstrap4.min.js',
    'public/dashboard/vendor/DataTables/JSZip/jszip.min.js',
    'public/dashboard/vendor/DataTables/pdfmake/build/pdfmake.min.js',
    'public/dashboard/vendor/DataTables/pdfmake/build/vfs_fonts.js',
    'public/dashboard/vendor/DataTables/Buttons/js/buttons.html5.min.js',
    'public/dashboard/vendor/DataTables/Buttons/js/buttons.print.min.js',
    'public/dashboard/vendor/DataTables/Buttons/js/buttons.colVis.min.js',
    'public/dashboard/html/js/tables-datatable.js',
//end datatable
    'resources/js/helper/helper.js',
    'public/dashboard/html/js/app.js',
    'public/dashboard/html/js/demo.js',
    'public/dashboard/html/js/form-plugins.js',
    // 'public/dashboard/html/js/index.js'
], 'public/js/all.js').version();