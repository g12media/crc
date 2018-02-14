<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title></title>


    <link rel="apple-touch-icon" href="{{URL::asset('admin/assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{URL::asset('admin/assets/images/favicon.ico')}}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{URL::asset('admin/global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/css/site.min.css')}}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/animsition/animsition.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/slidepanel/slidePanel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/flag-icon-css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/examples/css/pages/login-v2.css')}}">

    @yield('style')

    <!-- Fonts -->
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/web-icons/web-icons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="{{URL::asset('admin/global/vendor/html5shiv/html5shiv.min.js')}}"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{URL::asset('admin/global/vendor/media-match/media.match.min.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/respond/respond.min.js')}}"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="{{URL::asset('admin/global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
        Breakpoints();
    </script>


</head>
<body class="page-login-v2 layout-full page-dark">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
@yield('nav_bar')

<style>
      body {
        background: transparent;
      }
    </style>
<!-- Page -->
@yield('page_content')


<!-- End Page -->
<!-- Footer -->

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
@yield('plugins_script')
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

@yield('pages_script')

</body>
</html>
