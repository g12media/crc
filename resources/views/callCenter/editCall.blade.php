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
        @foreach($users as $u)
        <div class="panel">
          <header class="panel-heading">
            <center><h3 class="panel-title">Usuarios</h3>
            <h3 class="panel-title" style="font-weight: 100;">Nombre: <b>{{$u->name}} {{$u->lastName}}</b> Numero: <b>{{$u->phone}}</b> </h3></center>
          </header>
          <div class="panel-body">
            {!! Form::open(array('method' => 'POST','id' => 'formRegister' , 'enctype' => 'multipart/form-data')) !!}
              <input type="hidden" name="callId" value="{{$u->callId}}" />
              <div class="form-group form-material floating" data-plugin="formMaterial" >
                @if($u->status == 1)
                <select name="status" class="form-control" required>
                  <option value="1">Contestado</option>
                  <option value="0">No Contestado</option>
                </select>
                @else
                <select name="status" class="form-control" required>
                  <option value="0">No Contestado</option>
                  <option value="1">Contestado</option>
                </select>
                @endif
              </div>
              <div class="form-group form-material floating" data-plugin="formMaterial" >
                <select name="answer" class="form-control" required>
                  <option value="{{$u->answer}}">{{$u->answer}}</option>
                  <option value="participa">participa</option>
                  <option value="No participa">No participa</option>
                </select>
              </div>
              <div class="form-group form-material floating" data-plugin="formMaterial">
                <textarea class="form-control" name="description" id="textareaDefault" placeholder="Descripcion de la llamada" rows="3">{{$u->description}}</textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Guardar</button>
            {!! Form::close() !!}
          </div>
        </div>
        @endforeach
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
