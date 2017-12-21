@extends('layouts.login')

@section('style')

@stop


@section('page_content')
<div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <div class="page-brand-info">
        <div class="brand">
        
          <h2 class="brand-text font-size-40"></h2>
        </div>
        <p class="font-size-20"></p>
      </div>

      <div class="page-login-main animation-slide-right animation-duration-1">
        <div class="brand hidden-md-up">
          <img class="brand-img" src="{{URL::asset('admin/assets/images/logo-colored@2x.png')}}" alt="...">
          <h3 class="brand-text font-size-40"></h3>
        </div>
        <h3 class="font-size-24">Ingresar</h3>
        <p>Te invitamos a ser parte de este gran equipo que <br>estamos conformando, solo te tomará <br>unos pocos minutos para registrarte!.</p>

        <form method="POST" action="{{url('/login')}}" role="form">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="sr-only" for="inputEmail">Usuario</label>
            <input type="text" class="form-control" id="inputEmail" name="username" placeholder="Usuario">
          </div>
          <div class="form-group">
            <label class="sr-only" for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Contraseña">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
        </form>



        <footer class="page-copyright">

          <p>© 2017. Todos los derechos reservados.</p>

        </footer>
      </div>

    </div>
  </div>
    <!-- End Page -->
@stop

@section('plugins_script')
<script src="{{URL::asset('admin/assets/js/Site.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/jquery-placeholder.js')}}"></script>
<script>
      (function(document, window, $){
        'use strict';

        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
@stop

@section('pages_script')
<script src="{{URL::asset('admin/global/js/Component.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Base.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Config.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/Section/GridMenu.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/Section/Sidebar.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/Section/PageAside.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/Plugin/menu.js')}}"></script>
<script src="{{URL::asset('admin/global/js/config/colors.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/config/tour.js')}}"></script>
@stop
