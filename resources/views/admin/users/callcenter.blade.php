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
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <img class="navbar-brand-logo" src="../assets/images/logo.png" title="Remark">
          <span class="navbar-brand-text hidden-xs-down"> Remark</span>
        </div>
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
          </ul>
          <!-- End Navbar Toolbar -->

          <!-- Navbar Toolbar Right -->
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->

        <!-- Site Navbar Seach -->
        <!-- End Site Navbar Seach -->
      </div>
    </nav>
@stop

@section('page_content')
<div class="page bg-white">
  <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
    <ul class="nav nav-tabs nav-tabs-line" role="tablist">
        <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab" href="#one"
            aria-controls="activities" role="tab">Usuarios Call center</a></li>
      <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#two"
          aria-controls="activities" role="tab">Llamadas contestadas</a></li>
      <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#three"
              aria-controls="activities" role="tab">Llamadas no contestadas</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active animation-slide-left" id="one" role="tabpanel">
        <div class="panel-body" style="padding:15px 0px 0px 0px;">
          <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Contactos Asignados</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Contactos Asignados</th>
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
                  <?php
                  $id = $callcenterUsers->getCountUsers($um->id);
                  echo $id;
                  ?>
                </td>
                <td>
                  @if($id === 0)
                  <button type="button" class="btn btn-raised btn-primary" onclick="loadIdUser({{$um->id}})" data-target="#assignUsersForm" data-toggle="modal">Asignar Usuarios</button>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane animation-slide-left" id="two" role="tabpanel">
        <div class="panel-body" style="padding:15px 0px 0px 0px;">
          <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($answeredcalls as $ac)
              <tr>
                <td>{{$ac->identification}}</a></td>
                <td>{{$ac->name}}</td>
                <td>{{$ac->lastName}}</td>
                <td>{{$ac->email}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane animation-slide-left" id="three" role="tabpanel">
        <div class="panel-body" style="padding:15px 0px 0px 0px;">
          <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($unansweredcalls as $uc)
              <tr>
                <td>{{$uc->identification}}</a></td>
                <td>{{$uc->name}}</td>
                <td>{{$uc->lastName}}</td>
                <td>{{$uc->email}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      </div>
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
<!-- assignUsers -->
{!! Form::open(array('url' => 'administrator/callcenter/assignUsers', 'method' => 'POST', 'class' => 'modal-content', 'enctype' => 'multipart/form-data')) !!}
<div class="modal fade" id="assignUsersForm" aria-hidden="true" aria-labelledby="assignUsersForm"
  role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="width:100%;"><center>Asignar Usuarios callCenter</center></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="userIdAssign" id="userIdAssign" value=""/>
          <div class="form-group">
            <select name="userType" id="userType"required="" onchange="selectType()">
              <option value="">Seleccione tipo de usuarios</option>
              <option value="1">Random</option>
              <option value="2">Ministerio</option>
            </select>
          </div>

          <div class="form-group">
            <select name="ministry" id="ministry" style="display:none;">
              <option value="">Seleccione Ministerio</option>
              @foreach($ministry as $m)
              <option value="{{$m->id}}">{{$m->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <select name="random" id="random" style="display:none;">
              <option value="">Seleccione cantidad de usuarios</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="25">25</option>
            </select>
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
<!-- close assignUsers -->



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
function loadIdUser(Id){
  $('#userIdAssign').val(Id);
}
function selectType(){
  var userType = document.getElementById("userType").value;
  if(userType == 1){
    $("#ministry").fadeOut();
    $("#random").fadeIn();
  }else if(userType == 2){
    $("#ministry").fadeIn();
    $("#random").fadeIn();
}else{
    $("#ministry").fadeOut();
    $("#random").fadeOut();
  }
}
</script>
@stop
