@extends('layouts.register')

@section('page_content')
 <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <!-- Page -->
<style media="screen">

  .font-size-18 {
    font-size: 30px !important;
    padding-top: 10px!important;
}
</style>

  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
            <h2 class="brand-text font-size-18">Votantes</h2>
          </div>
          {!! Form::open(array('method' => 'POST','id' => 'formRegister' , 'enctype' => 'multipart/form-data')) !!}
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="number" class="form-control" name="identification" />
              <label class="floating-label">Numero de Identificacion</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Entrar</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
<!-- End Page -->

@stop


@section('script_validation')
<script>
(function () {
    $('#formRegister').formValidation({
      framework: "bootstrap4",
      fields: {
        identification: {
          validators: {
            notEmpty: {
              message: 'Digite su Identificacion'
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
  })();
</script>
@stop
