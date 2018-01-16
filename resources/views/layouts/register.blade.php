
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>Registro | </title>

    <link rel="apple-touch-icon" href="{{URL::asset('admin/assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{URL::asset('admin/assets/images/favicon.ico')}}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{URL::asset('admin/global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/css/site.min.css')}}">

    <!-- Plugins -->
    <!-- Plugins -->
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/animsition/animsition.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/slidepanel/slidePanel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/flag-icon-css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/examples/css/pages/register-v3.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/formvalidation/formValidation.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/examples/css/forms/validation.css')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/glyphicons/glyphicons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/font-awesome/font-awesome.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/weather-icons/weather-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/web-icons/web-icons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{{URL::asset('admin/global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
      Breakpoints();
    </script>
    <style>
    .form-material.floating+.form-material.floating {
        margin-top: 23px;
    }
    .page-register-v3 .panel .panel-body {
        padding: 1px 30px 30px;
    }
    h2.register-title {
        margin-top: 0px;
        color: white;
        font-size: 20px;
        font-family: Helvetica;
    }
    .page-content{
      width: 100%;
    }
    .table td, .table th {

    background: white;
}

.page-register-v3 .panel {
    width: 100%;
}
h4 {
    margin-top: 12px !important;
}
li {
    text-align: justify;
    margin-bottom: 10px;
}
    </style>
  </head>
  <body class="animsition page-register-v3 layout-full">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    @yield('page_content')


    <!-- Core  -->
    <script src="{{URL::asset('admin/global/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/jquery/jquery.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/popper-js/umd/popper.min.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/bootstrap/bootstrap.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/animsition/animsition.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/asscrollbar/jquery-asScrollbar.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/asscrollable/jquery-asScrollable.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/ashoverscroll/jquery-asHoverScroll.js')}}"></script>


    <!-- Plugins -->
    <script src="{{URL::asset('admin/global/vendor/switchery/switchery.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/intro-js/intro.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/screenfull/screenfull.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/formvalidation/formValidation.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/formvalidation/framework/bootstrap4.min.js')}}"></script>


    <!-- Scripts -->
    <script src="{{URL::asset('admin/global/js/Component.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/Plugin.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/Base.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/Config.js')}}"></script>
    <script src="{{URL::asset('admin/assets/js/Section/Menubar.js')}}"></script>
    <script src="{{URL::asset('admin/assets/js/Section/GridMenu.js')}}"></script>
    <script src="{{URL::asset('admin/assets/js/Section/Sidebar.js')}}"></script>
    <script src="{{URL::asset('admin/assets/js/Section/PageAside.js')}}"></script>
    <script src="{{URL::asset('admin/assets/js/Plugin/menu.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/config/colors.js')}}"></script>
    <script src="{{URL::asset('admin/assets/js/config/tour.js')}}"></script>
    <script>Config.set('assets', "{{URL::asset('admin/assets')}}");</script>


    <!-- Page -->
    <script src="{{URL::asset('admin/assets/js/Site.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/Plugin/asscrollable.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/Plugin/slidepanel.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/Plugin/switchery.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/Plugin/jquery-placeholder.js')}}"></script>
    <script src="{{URL::asset('admin/global/js/Plugin/material.js')}}"></script>

    <script>
      (function(document, window, $){
        'use strict';

        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>


    @yield('script_validation')
  </body>
</html>
