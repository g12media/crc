@extends('layouts.master')

@section('menu')
@include('layouts.menu.dashboard')
@stop

@section('style')

@stop

@section('nav_bar')
<h4>Hola Usuario</h4>
    <!-- End Page -->
@stop


@section('pages_script')
<script src="{{URL::asset('admin/assets/js/Site.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/matchheight.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/jvectormap.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v1.jss')}}"></script>

@stop
