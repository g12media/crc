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
      <div class="col-lg-3">
        <!-- Page Widget -->
        <div class="card card-shadow text-center">
          <div class="card-block">
            <center>
              <i class="icon fa-user-circle" aria-hidden="true" style="font-size: 64px;"></i>
            </center>
            <h4 class="profile-user">{{$user->name}}</h4>
            @if($user->level == 1728 || $user->level == 20736 || $user->level == 248832)
            <a href="/administrator/users/{{Crypt::encrypt($user->userId)}}">
              <button type="button" class="btn btn-primary">
              <i class="icon fa-arrow-circle-o-left" aria-hidden="true" style="font-size: 25px;"></i>
            </button>
          </a>
            @else
            <a href="/administrator/users"><button type="button" class="btn btn-primary">
              <i class="icon fa-arrow-circle-o-left" aria-hidden="true" style="font-size: 25px;"></i>
            </button></a>
            @endif


          </div>
          <div class="card-footer">
            <div class="row no-space">
              <div class="col-12">
                    <strong class="profile-stat-count"></strong>
                    <span>Nivel: {{$user->level}}</span>
              </div>
              <div class="col-12" style="margin-top:10px;">
                <a href="/formulario/{{date('Y').'-'.$user->id.'-'.date('Hms')}}" target="_blank"><button type="button" class="btn btn-primary">
                  <i class="icon fa-id-card-o" aria-hidden="true" style="font-size: 20px;"></i> Formulario Valientes
                </button></a>
                <button type="button" class="" data-target="#masiveUploads" data-toggle="modal">
                  <i class="icon fa-upload" aria-hidden="true"></i> Subir Formulario
                </button>
              </div>


            </div>
          </div>
        </div>
        <div class="card card-block p-20 bg-blue-600">
          <div class="counter counter-lg counter-inverse">
            <div class="counter-label text-uppercase font-size-16"># Valientes</div>
            <div class="counter-number-group">
              <span class="counter-number">{{$valientes}}</span>
              <span class="counter-icon ml-10"><i class="icon wb-users" aria-hidden="true"></i></span>
            </div>
          </div>
        </div>

        <div class="card card-block p-20 bg-blue-600">
          <div class="counter counter-lg counter-inverse">
            <div class="counter-label text-uppercase font-size-16">Contactos</div>
            <div class="counter-number-group">
              <span class="counter-number">{{$contacts}}</span>
              <span class="counter-icon ml-10"><i class="icon wb-users" aria-hidden="true"></i></span>
            </div>

          </div>
        </div>
        <!-- End Page Widget -->
      </div>

      <div class="col-lg-9">
        <!-- Panel -->
        <div class="panel">
          <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab" href="#activities"
                  aria-controls="activities" role="tab">Valientes</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#contactos"
                  aria-controls="activities" role="tab">Contactos</a></li>

            </ul>

            <div class="tab-content">
              <div class="tab-pane active animation-slide-left" id="activities" role="tabpanel">
                <div class="panel-body" style="padding:15px 0px 0px 0px;">
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
                        <td><a href="/administrator/users/{{date('Y').'-'.$um->id.'-'.date('Hms')}}">{{$um->identification}}</a></td>
                        <td>{{$um->name}}</td>
                        <td>{{$um->lastName}}</td>
                        <td>{{$um->email}}</td>
                        <td>
                          <button type="button" class="" data-target="#deleteUserForm" data-toggle="modal" onclick="loadIdDelete({{$um->id}})">
                            <i class="icon fa-trash" aria-hidden="true"></i>
                          </button>
                          <button type="button" class="" data-target="#editUserForm" data-toggle="modal" onclick="loadIdEdit({{$um->id}})">
                            <i class="icon fa-edit" aria-hidden="true"></i>
                          </button>


                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane animation-slide-left" id="contactos" role="tabpanel">
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
                      @foreach($usersContact as $uc)
                      <tr>
                        <td><a href="/administrator/users/{{date('Y').'-'.$uc->id.'-'.date('Hms')}}">{{$uc->identification}}</a></td>
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
        <!-- End Panel -->
      </div>
    </div>

  </div>
  <!-- Panel Basic -->


</div>

<!-- Site Action -->
<div class="site-action" data-plugin="actionBtn">
  <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating" data-target="#addUserForm" data-toggle="modal">
    <i class="front-icon wb-plus animation-scale-up" aria-hidden="true"></i>
    <i class="back-icon wb-close animation-scale-up" aria-hidden="true"></i>
  </button>

</div>
<!-- End Site Action -->
<!-- Edit User Form-->
{!! Form::open(array('url' => 'administrator/users/edit', 'method' => 'POST', 'class' => 'modal-content', 'enctype' => 'multipart/form-data')) !!}
<div class="modal fade" id="editUserForm" aria-hidden="true" aria-labelledby="editUserForm"
  role="dialog" tabindex="-1">
  <input type="hidden" name="userId" id="userId" value="" />
  <input type="hidden" name="leader" id="leader" value="{{$user->id}}"/>
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>

      </div>
      <div class="modal-body">
          <center>  <h4 class="modal-title">Formulario Registro</h4></center>
          <br>
          <div class="form-group">
            <input type="text" class="form-control" name="identificacion" id="identificacionEdit" placeholder="Identificacion" required/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="name" id="nameEdit" placeholder="Nombres" required/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="lastName" id="lastNameEdit" placeholder="Apellidos" required/>
          </div>
          <div class="form-group">
            <select name="gender" id="genderEdit" required>
              <option value="">Seleccione un Genero</option>
              <option value="masculino">Masculino</option>
              <option value="femenino">Femenino</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="email" id="emailEdit" placeholder="Email" />
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="phone" id="phoneEdit" placeholder="Telefono / Celular" required/>
          </div>

          <div class="form-group">
            <select name="location" id="locationEdit" required>
              <option value="">Localidad donde Vive</option>
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
            <select name="locationVote" id="locationVoteEdit" required>
              <option value="">Localidad donde Vota</option>
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
            <input type="text" class="form-control" name="neighborhood" id="neighborhoodEdit" placeholder="Barrio" required/>
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
<!-- Edit User Form -->

<!-- Add User Form -->
{!! Form::open(array('url' => 'administrator/users/add/{{$user->id}}', 'method' => 'POST', 'class' => 'modal-content', 'enctype' => 'multipart/form-data')) !!}
<div class="modal fade" id="addUserForm" aria-hidden="true" aria-labelledby="addUserForm"
  role="dialog" tabindex="-1">
  <input type="hidden" name="leader" value="{{date('Y').'-'.$user->id.'-'.date('Hms')}}" />
  <input type="hidden" name="type" value="{{$user->contactType}}" />
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>

      </div>
      <div class="modal-body">
          <center>  <h4 class="modal-title">Formulario Registro</h4></center>
          <br>
          <div class="form-group">
            <input type="text" class="form-control" name="identificacion" placeholder="Identificacion" required/>
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
            <input type="text" class="form-control" name="email" placeholder="Email" />
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Telefono / Celular" required/>
          </div>
          @if($user->contactType != 'sede')
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
            <select name="locationVote" required>
              <option value="">Localidad donde Vota</option>
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
          @else
          <div class="form-group">
            <input type="text" class="form-control" name="department" placeholder="Departamento"required/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="city" placeholder="Ciudad / Municipio" required/>
          </div>
          @endif
          <div class="form-group">
            <input type="text" class="form-control" name="neighborhood" placeholder="Barrio" required/>
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



<!-- Add User Form -->
{!! Form::open(array('url' => 'administrator/users/delete/', 'method' => 'POST', 'class' => 'modal-content', 'enctype' => 'multipart/form-data')) !!}
<div class="modal fade" id="deleteUserForm" aria-hidden="true" aria-labelledby="deleteUserForm" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
          <center>  <h4 class="modal-title">Eliminar Usuario</h4></center>
          <input type="hidden" name="userId" id="userIdDelete" value="" />
          <input type="hidden" name="leader" value="{{$user->id}}" />
          <br>
          <p>Recuerde que eliminara un usuario y su red descendente (Contactos y Grupo) por lo cual solicitamos la confirmacion del documento para eliminar el usuario</p>
          <div class="form-group">

            <input type="text" class="form-control" name="identification" placeholder="Identificacion" required/>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="submit">Eliminar</button>
        <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancelar</a>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
<!-- End Add User Form -->




{!! Form::open(array('url' => 'administrator/users/upload', 'method' => 'POST', 'class' => 'modal-content', 'enctype' => 'multipart/form-data')) !!}
<div class="modal fade" id="masiveUploads" aria-hidden="true" aria-labelledby="masiveUploads" role="dialog" tabindex="-1">
  <input type="hidden" name="userId" id="userId" value="" />
  <input type="hidden" name="leader" id="leader" value="{{$user->id}}"/>
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>

      </div>
      <div class="modal-body">
          <center>  <h4 class="modal-title">Formulario Registro Masivo</h4></center>
          <br>
          <div class="form-group">
            <input type="file" class="form-control" name="fileData" id="fileData" placeholder="Archivos" required/>
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
<!-- Edit User Form -->


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
<script>
  function loadIdDelete(Id){
    console.log("Delete ID:" + Id)
    $('#userIdDelete').val(Id);
  }
function loadIdEdit(Id){
  $.get( "get/"+Id).done(function(data) {
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
