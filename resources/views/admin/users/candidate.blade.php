@extends('layouts.master')

@section('menu')
@include('layouts.menu.administrator')
@stop

@section('style')
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.css')}}">
<link rel="stylesheet" href="{{URL::asset('admin/global/vendor/formvalidation/formValidation.css')}}">
        <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload.css')}}">
        <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/dropify/dropify.css')}}">

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
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle">
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
<div class="page">
  <div class="page-content container-fluid">
    <div class="row" data-plugin="matchHeight" data-by-row="true">
      <div class="col-xxl-12 col-lg-12">
        <!-- Widget Linearea Color -->
        <div class="card card-shadow card-responsive" id="widgetLineareaColor">
          <div class="card-block p-0">
                <div class="panel" id="exampleWizardFormContainer">
              <div class="panel-heading">
                <h3 class="panel-title">Crear candidato</h3>
              </div>
              <div class="panel-body">
                <!-- Steps -->
                <div class="pearls row">
                  <div class="pearl current col-6">
                    <div class="pearl-icon"><i class="icon wb-home" aria-hidden="true"></i></div>
                    <span class="pearl-title">Datos del candidato</span>
                  </div>
                  <div class="pearl col-6">
                    <div class="pearl-icon"><i class="icon wb-user" aria-hidden="true"></i></div>
                    <span class="pearl-title">Confirmacion</span>
                  </div>
                </div>
                <!-- End Steps -->

                <!-- Wizard Content -->
                <form id="exampleFormContainer" method="POST" enctype="multipart/form-data">
                  <div class="wizard-content">
                    <div class="wizard-pane active" id="exampleAccountOne" role="tabpanel">
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                      <div class="row">
                        <div class="col-xxl-6 col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="inputUserNameOne">identificacion</label>
                            <input type="number" class="form-control" id="identification" name="identification" required="required">
                          </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="inputUserNameOne">Nombres</label>
                            <input type="text" class="form-control" id="name" name="name" required="required">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xxl-6 col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="inputUserNameOne">Apellidos</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required="required">
                          </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6">
                          <label class="form-control-label" for="inputUserNameOne">Genero</label>
                          <div class="form-group floating" data-plugin="formMaterial" style="margin-top: 10px;">
                            <select name="gender" class="form-control" id="gender">
                              <option value="">Seleccione un Genero</option>
                              <option value="masculino">Masculino</option>
                              <option value="femenino">Femenino</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xxl-6 col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="inputUserNameOne">Telefono / Celular</label>
                            <input type="text" class="form-control" id="phone" name="phone" required="required">
                          </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="inputUserNameOne">Usuario</label>
                            <input type="text" class="form-control" id="username" name="username" required="required">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xxl-6 col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="inputUserNameOne">Contraseña</label>
                            <input type="password" class="form-control" id="inputPasswordOne" name="password" required="required">
                          </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="inputUserNameOne">Confirmacion Contraseña</label>
                            <input type="password" class="form-control" id="inputPasswordOne" name="repassword" required="required">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="wizard-pane" id="exampleBillingTwo" role="tabpanel">
                      <div class="text-center my-20">
                        <h4>Seleccione las sedes</h4>
                        @foreach($headquarter as $h)
                        <div class="checkbox-custom checkbox-primary">
                          <input type="checkbox" id="headquarter" name="headquarter[]" value="{{$h->id}}">
                          <label for="inputUnchecked">{{$h->city}} ({{$h->name}} {{$h->lastName}})</label>
                        </div>
                        @endforeach
                        <input type="submit" name="sendForm" id="sendForm" value="Enviar" style="display:none;"/>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- Wizard Content -->
              </div>
            </div>
          </div>
        </div>
        <!-- End Widget Linearea Color -->
      </div>

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
<script src="{{URL::asset('admin/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/matchheight.js')}}"></script>
<script src="{{URL::asset('admin/global/js/Plugin/jvectormap.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v1.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/jquery-wizard/jquery-wizard.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/formvalidation/formValidation.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/formvalidation/framework/bootstrap.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/matchheight/jquery.matchHeight-min.js')}}"></script>
        <script src="{{URL::asset('admin/global/js/Plugin/jquery-wizard.js')}}"></script>
        <script src="{{URL::asset('admin/global/js/Plugin/matchheight.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/jquery-ui/jquery-ui.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-tmpl/tmpl.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-canvas-to-blob/canvas-to-blob.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-load-image/load-image.all.min.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-process.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-image.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-audio.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-video.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-validate.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/blueimp-file-upload/jquery.fileupload-ui.js')}}"></script>
        <script src="{{URL::asset('admin/global/vendor/dropify/dropify.min.js')}}"></script>

<script type="text/javascript">
$.ajaxSetup({
 headers: {
     'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
   }
});

(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define('/forms/wizard', ['jquery', 'Site'], factory);
  } else if (typeof exports !== "undefined") {
    factory(require('jquery'), require('Site'));
  } else {
    var mod = {
      exports: {}
    };
    factory(global.jQuery, global.Site);
    global.formsWizard = mod.exports;
  }
})(this, function (_jquery, _Site) {
  'use strict';

  var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

  (0, _jquery2.default)(document).ready(function ($$$1) {
    (0, _Site.run)();
  });


  // Example Wizard Form Container
  // -----------------------------
  // http://formvalidation.io/api/#is-valid-container
  (function () {
    var defaults = Plugin.getDefaults("wizard");

    var options = _jquery2.default.extend(true, {}, defaults, {
      onInit: function onInit() {
        (0, _jquery2.default)('#exampleFormContainer').formValidation({
          framework: 'bootstrap',
          fields: {
          password: {
              validators: {
                  identical: {
                      field: 'repassword',
                      message: 'La contraseña no coincide'
                  }
              }
          },repassword: {
              validators: {
                  identical: {
                      field: 'password',
                      message: 'La contraseña no coincide'
                  }
              }
            },
            name: {
              validators: {
                notEmpty: {
                  message: 'Dijite sus nombres'
                }
              }
            },lastname: {
              validators: {
                notEmpty: {
                  message: 'Dijite sus apellidos'
                }
              }
            },phone: {
              validators: {
                notEmpty: {
                  message: 'Dijite su telefono'
                }
              }
            },cityUser: {
              validators: {
                notEmpty: {
                  message: 'Dijite su Ciudad'
                }
              }
            },email: {
              validators: {
                notEmpty: {
                  message: 'Dijite su Correo Electronico'
                }
              }
            },username: {
              validators: {
                notEmpty: {
                  message: 'Dijite su Usuario'
                }
              }
            },idProperty: {
              validators: {
                notEmpty: {
                  message: 'Dijite su Usuario'
                }
              }
            }
          },
          err: {
            clazz: 'invalid-feedback'
          },
          control: {
            // The CSS class for valid control
            valid: 'is-valid',

            // The CSS class for invalid control
            invalid: 'is-invalid'
          },
          row: {
            invalid: 'has-danger'
          }
        });
      },
      validator: function validator() {
        var fv = (0, _jquery2.default)('#exampleFormContainer').data('formValidation');

        var $this = (0, _jquery2.default)(this);

        // Validate the container
        fv.validateContainer($this);

        var isValidStep = fv.isValidContainer($this);
        if (isValidStep === false || isValidStep === null) {
          return false;
        }

        return true;
      },
      onFinish: function onFinish() {
        // $('#exampleFormContainer').submit();
        $("#sendForm").trigger("click");
      },
      buttonsAppendTo: '.panel-body'
    });

    (0, _jquery2.default)("#exampleWizardFormContainer").wizard(options);
  })();
});
$(document).ready(function() {
// Instrucciones a ejecutar al terminar la carga
Dropzone.options.myAwesomeDropzone = {
    images: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function(file, done) {
      if (file.name == "justinbieber.jpg") {
        done("Naha, you don't.");
      }
      else { done(); }
    }
  };
});
</script>
@stop
