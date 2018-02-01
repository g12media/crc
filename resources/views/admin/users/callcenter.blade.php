@extends('layouts.master')

@section('menu')
@include('layouts.menu.administrator')
@stop

@section('style')
    <link rel="stylesheet" href="URL::asset('admin/global/vendor/datatables.net-bs4/dataTables.bootstrap4.css')">
    <link rel="stylesheet" href="URL::asset('admin/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css')">
    <link rel="stylesheet" href="URL::asset('admin/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css')">
    <link rel="stylesheet" href="URL::asset('admin/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css')">
    <link rel="stylesheet" href="URL::asset('admin/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css')">
    <link rel="stylesheet" href="URL::asset('admin/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css')">
    <link rel="stylesheet" href="URL::asset('admin/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css')">
    <link rel="stylesheet" href="URL::asset('admin/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css')">
    <link rel="stylesheet" href="URL::asset('admin/assets/examples/css/tables/datatable.css')">

@stop

@section('body')
<body class="animsition app-contacts page-aside-left site-menubar-fold">
@stop
@section('nav_bar')
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <img class="navbar-brand-logo" src="/logo-crc.png" title="Remark">
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
          data-toggle="collapse">
          <span class="sr-only">Toggle Search</span>
          <i class="icon wb-search" aria-hidden="true"></i>
        </button>
      </div>

      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
            </li>
            <li class="nav-item hidden-sm-down" id="toggleFullscreen">
              <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                <span class="sr-only">Pantalla Completa</span>
              </a>
            </li>

          </ul>
          <!-- End Navbar Toolbar -->


        </div>
        <!-- End Navbar Collapse -->

        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
          <form role="search">
            <div class="form-group">
              <div class="input-search">
                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
        <!-- End Site Navbar Seach -->
      </div>
    </nav>
@stop

@section('page_content')
<div class="page bg-white">
  <div class="page-content container-fluid">
    <div class="row">
      <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
        <thead>
          <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Opciones</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($users as $um)
          <tr>
            <td>{{$um->identification}}</a></td>
            <td>{{$um->name}}</td>
            <td>{{$um->lastName}}</td>
            <td>{{$um->email}}</td>
            <td>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    </div>
  </div>

<!-- Site Action -->
<div class="site-action" data-plugin="actionBtn">
  <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating" data-target="#addUserForm" data-toggle="modal">
    <i class="front-icon wb-plus animation-scale-up" aria-hidden="true"></i>
    <i class="back-icon wb-close animation-scale-up" aria-hidden="true"></i>
  </button>
</div>
<!-- Add User Form -->
{!! Form::open(array('url' => 'administrator/callcenter', 'method' => 'POST', 'class' => 'modal-content', 'enctype' => 'multipart/form-data')) !!}
<div class="modal fade" id="addUserForm" aria-hidden="true" aria-labelledby="addUserForm"
  role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="width:100%;"><center>Agregar Usuario callCenter</center></h4>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <input type="text" class="form-control" name="identification" placeholder="Identificacion" required/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nombres" required/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="lastName" placeholder="Apellidos" required/>
          </div>
          <div class="form-group">
            <select name="gender" required>
              <option value="">Seleccione un Genero</option>
              <option value="masculino">Masculino</option>
              <option value="femenino">Femenino</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email" required/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Telefono / Celular" required/>
          </div>

          <div class="form-group">
            <select name="location" required>
              <option value="Antonio Nariño">Seleccione una Localidad</option>
              <option value="Antonio Nariño">Antonio Nariño</option>
              <option value="Barrios Unidos">Barrios Unidos</option>
              <option value="Bosa">Bosa</option>
              <option value="Chapinero">Chapinero</option>
              <option value="Ciudad Bolivar">Ciudad Bolivar</option>
              <option value="Engativa">Engativa</option>
              <option value="Fontibon">Fontibon</option>
              <option value="Kennedy">Kennedy</option>
              <option value="La Candelaria">La Candelaria</option>
              <option value="Los Martires">Los Martires</option>
              <option value="Puente Aranda">Puente Aranda</option>
              <option value="Rafael Uribe Uribe">Rafael Uribe Uribe</option>
              <option value="San Cristobal">San Cristobal</option>
              <option value="Santa Fe">Santa Fe</option>
              <option value="Suba">Suba</option>
              <option value="Sumapaz">Sumapaz</option>
              <option value="Teusaquillo">Teusaquillo</option>
              <option value="Tunjuelito">Tunjuelito</option>
              <option value="Usaquen">Usaquen</option>
              <option value="Usme">Usme</option>
              <option value="Soacha">Municipio - Soacha</option>
              <option value="Mosquera">Municipio - Mosquera</option>
              <option value="Madrid">Municipio - Madrid</option>
              <option value="Chia">Municipio - Chia</option>
              <option value="Cajica">Municipio - Cajica</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="neighborhood" placeholder="Barrio" required />
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancelar</a>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
<!-- End Add User Form -->




@stop

@section('plugins_script')
<script src="{{URL::asset('admin/global/vendor/switchery/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/intro-js/intro.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/screenfull/screenfull.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-scroller/dataTables.scroller.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-responsive/dataTables.responsive.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-buttons/dataTables.buttons.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-buttons/buttons.html5.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-buttons/buttons.flash.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-buttons/buttons.print.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-buttons/buttons.colVis.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asrange/jquery-asRange.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/bootbox/bootbox.js')}}"></script>


@stop

@section('pages_script')
<script src="{{URL::asset('admin/assets/js/Site.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<script src="{{URL::asset('admin/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/switchery.js')}}"></script>

<script src="{{URL::asset('admin/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/datatables.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/tables/datatable.js')}}"></script>

<script src="{{URL::asset('admin/assets/js/dashboard.js')}}"></script>


<script type="text/javascript">

function loadIdDelete(Id){
  $('#userIdDelete').val(Id);
}
function loadIdEdit(Id){
  $.get( "users/get/"+Id).done(function(data) {
      $('#userId').val(Id);
      $("#identificacionEdit").val(data.identification);
      $("#nameEdit").val(data.name);
      $("#lastNameEdit").val(data.lastName);
      $("#dateEdit").val(data.date);
      $("#genderEdit").val(data.gender);
      $("#emailEdit").val(data.email);
      $("#phoneEdit").val(data.phone);
      $("#locationEdit").val(data.location);
      $("#locationVoteEdit").val(data.locationVote);
      $("#neighborhoodEdit").val(data.neighborhood);

  });
}

</script>
@stop
