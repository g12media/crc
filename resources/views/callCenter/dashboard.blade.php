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
            <div class="panel-actions"><button type="button" onclick="window.location.href='/administrator/properties/add'" class="btn btn-floating btn-success btn-sm"><i class="icon io-plus" aria-hidden="true"></i></button></div>
            <h3 class="panel-title">Usuarios</h3>
          </header>
          <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab" href="#calls"
                    aria-controls="activities" role="tab">Equipo</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#calling"
                      aria-controls="activities" role="tab">Mujeres</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active animation-slide-left" id="calls" role="tabpanel">
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
                      @foreach($call as $c)
                      <tr>
                        <td>{{$c->name}}</td>
                        <td>{{$c->lastName}}</td>
                        <td>{{$c->phone}}</td>
                        <td>{{$c->email}}</td>
                        <td><button onclick="window.location.href='/callCenter/call/{{Crypt::encrypt($c->id)}}'" type="button" class="btn btn-raised btn-primary">Llamar</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane animation-slide-left" id="calling" role="tabpanel">
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
                      @foreach($users as $u)
                      <tr>
                        <td>{{$u->name}}</td>
                        <td>{{$u->lastName}}</td>
                        <td>{{$u->phone}}</td>
                        <td>{{$u->email}}</td>
                        <td><button onclick="window.location.href='/callCenter/call/{{Crypt::encrypt($u->id)}}'" type="button" class="btn btn-raised btn-primary">Detalles</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane animation-slide-left" id="messages" role="tabpanel">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
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

@stop
