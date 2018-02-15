@extends('layouts.master')

@section('menu')
@include('layouts.menu.administrator')
@stop

@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/datatables.net-bs4/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/assets/examples/css/tables/datatable.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/fonts/open-iconic/open-iconic.css')}}">
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
<!-- Page -->
    <div class="page">
      <div class="page-content">
        <div class="panel">
          <header class="panel-heading">
          <div class="row">
            @if($user->contactType == 'call-center')
            <div class="col-lg-4">
              <div class="card card-block p-20 bg-blue-600">
                <div class="counter counter-lg counter-inverse">
                  <div class="counter-label text-uppercase font-size-16">Usuarios Asignados</div>
                  <div class="counter-number-group">
                    <span class="counter-number">{{$usersAssignTotal}}</span>
                    <span class="counter-icon ml-10"><i class="icon wb-users" aria-hidden="true"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-block p-20 bg-blue-600">
                <div class="counter counter-lg counter-inverse">
                  <div class="counter-label text-uppercase font-size-16">Llamadas Contestadas</div>
                  <div class="counter-number-group">
                    <span class="counter-number">{{$answeredcallsTotal}}</span>
                    <span class="counter-icon ml-10"><i class="icon wb-users" aria-hidden="true"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-block p-20 bg-blue-600">
                <div class="counter counter-lg counter-inverse">
                  <div class="counter-label text-uppercase font-size-16">Llamadas No Contestadas</div>
                  <div class="counter-number-group">
                    <span class="counter-number">{{$unansweredcallsTotal}}</span>
                    <span class="counter-icon ml-10"><i class="icon wb-users" aria-hidden="true"></i></span>
                  </div>
                </div>
              </div>
            </div>
            @else
            <div class="col-lg-12">
              <div class="card card-block p-20 bg-blue-600">
                <div class="counter counter-lg counter-inverse">
                  <div class="counter-label text-uppercase font-size-16">Usuarios Asignados</div>
                  <div class="counter-number-group">
                    <span class="counter-number">{{$usersAssignTotal}}</span>
                    <span class="counter-icon ml-10"><i class="icon wb-users" aria-hidden="true"></i></span>
                  </div>
                </div>
              </div>
            </div>
            @endif
          </div>
          </header>
          @if($user->contactType == 'call-center')
          <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab" href="#one"
                    aria-controls="activities" role="tab">Usuarios Asignados</a></li>
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
                        <th>Identificacion</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Identificacion</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Opciones</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach($usersAssign as $ua)
                      <tr>
                        <td>{{$ua->identification}}</td>
                        <td>{{$ua->name}}</td>
                        <td>{{$ua->lastName}}</td>
                        <td>{{$ua->phone}}</td>
                        <td>{{$ua->email}}</td>
                        <td><button onclick="loadIdCall({{$ua->id}})" data-target="#UserIdCall" data-toggle="modal" type="button" class="btn btn-raised btn-primary">Llamar</button></td>
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
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Opciones</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach($answeredcalls as $ac)
                      <tr>
                        <td>{{$ac->name}}</td>
                        <td>{{$ac->lastName}}</td>
                        <td>{{$ac->phone}}</td>
                        <td>{{$ac->email}}</td>
                        <td><button onclick="window.location.href='/callCenter/details/{{Crypt::encrypt($ac->id)}}'" type="button" class="btn btn-raised btn-primary">Detalles</button></td>
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
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Opciones</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach($unansweredcalls as $uc)
                      <tr>
                        <td>{{$uc->name}}</td>
                        <td>{{$uc->lastName}}</td>
                        <td>{{$uc->phone}}</td>
                        <td>{{$uc->email}}</td>
                        <td><button onclick="window.location.href='/callCenter/edit/{{Crypt::encrypt($uc->id)}}'" type="button" class="btn btn-raised btn-primary">Editar</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
          @else
          <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab" href="#one"
                    aria-controls="activities" role="tab">Usuarios Asignados</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active animation-slide-left" id="one" role="tabpanel">
                <div class="panel-body" style="padding:15px 0px 0px 0px;">
              <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                <thead>
                  <tr>
                    <th>Identificacion</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo Electronico</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Identificacion</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo Electronico</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($users as $u)
                  <tr>
                    <td>{{$u->identification}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->lastName}}</td>
                    <td>{{$u->phone}}</td>
                    <td>{{$u->email}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @endif
      </div>
        </div>
      </div>
    </div>
    {!! Form::open(array('url' => 'callCenter/call', 'method' => 'POST', 'class' => 'modal-content', 'enctype' => 'multipart/form-data')) !!}
    <div class="modal fade" id="UserIdCall" aria-hidden="true" aria-labelledby="UserIdCall" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
          </div>
          <div class="modal-body">
            <center><h3 class="panel-title">Usuarios</h3>
            <h3 class="panel-title" style="font-weight: 100;">Nombre: <input type="text" name="nameUserCall" id="nameUserCall" value="" disabled style="border: 0px !important;"/> <br>Numero: <input type="text" name="phoneUserCall" id="phoneUserCall" value="" disabled style="border: 0px !important;"/></h3></center>
    <input type="hidden" name="userIdCall" id="userIdCall" value="" />
    <div class="form-group form-material floating" data-plugin="formMaterial" >
      <select name="status" class="form-control" required>
        <option value="">Seleccione un Estado</option>
        <option value="1">Contestado</option>
        <option value="0">No Contestado</option>
      </select>
    </div>
    <div class="form-group form-material floating" data-plugin="formMaterial" >
      <select name="answer" class="form-control" required>
        <option value="">Seleccione una Respuesta</option>
        <option value="participa">participa</option>
        <option value="No participa">No participa</option>
      </select>
    </div>
    <div class="form-group form-material floating" data-plugin="formMaterial">
      <textarea class="form-control" name="description" id="textareaDefault" placeholder="Descripcion de la llamada" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Guardar</button>
    </div>
    </div>
    </div>
    </div>
    {!! Form::close() !!}
    <!-- End Page -->
@stop


@section('pages_script')
<script src="{{URL::asset('admin/assets/js/Site.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/matchheight.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/jvectormap.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v1.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.js')}}"></script>
        <script src="{{URL::asset('admin/global/js/Plugin/datatables.js')}}"></script>
        <script src="{{URL::asset('admin/assets/examples/js/tables/datatable.js')}}"></script>
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
        <script type="text/javascript">

        function loadIdCall(Id){
          $('#userIdCall').val(Id);

          $.get( "callCenter/get/"+Id).done(function(data) {
              $("#nameUserCall").val(data.name);
              $("#phoneUserCall").val(data.phone);

          });
        }

        </script>
@stop
