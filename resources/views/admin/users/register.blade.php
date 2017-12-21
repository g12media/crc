@extends('layouts.register')

@section('page_content')
 <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <!-- Page -->

  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <h2 class="register-title">Registro de Usuarios</h2>
      <div class="panel">

        <div class="panel-body">
          {!! Form::open(array('method' => 'POST', 'enctype' => 'multipart/form-data')) !!}

            <input type="hidden" name="leader" value="{{$userId}}" />
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="identification" />
              <label class="floating-label">Identificacion</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="name" />
              <label class="floating-label">Nombres</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="lastName" />
              <label class="floating-label">Apellidos</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <select name="gender" class="form-control">
                <option value="">Seleccione un Genero</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
              </select>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="email" class="form-control" name="email" />
              <label class="floating-label">Email</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="phone" />
              <label class="floating-label">Telefono</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <select name="location" class="form-control">
                <option value="Antonio Nariño">Antonio Nariño</option>
                <option value="Barrios Unidos">Barrios Unidos</option>
                <option value="Bosa">Bosa</option>
                <option value="Chapinero">Chapinero</option>
                <option value="Ciudad Bolivar">Ciudad Bolivar</option>
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
              </select>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="neighborhood" />
              <label class="floating-label">Barrio</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Guardar</button>
          {!! Form::close() !!}

        </div>
      </div>

      <footer class="page-copyright page-copyright-inverse">

        <p>© 2018. politicas y privacidad.</p>
    
        </div>
      </footer>
    </div>
  </div>
  <!-- End Page -->

@stop
