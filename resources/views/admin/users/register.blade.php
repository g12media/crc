@extends('layouts.register')

@section('page_content')
 <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <!-- Page -->

  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <h2 class="register-title">Ministerio {{$user->name}} {{$user->lastName}}</h2>
      <div class="row">
      <div class="col-5" style="margin-top:10px;">
      <div class="panel">

        <div class="panel-body">
          {!! Form::open(array('method' => 'POST', 'enctype' => 'multipart/form-data')) !!}

            <input type="hidden" name="leader" value="{{$userId}}" />
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="identification" required/>
              <label class="floating-label">Identificacion</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="name"  required/>
              <label class="floating-label">Nombres</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="lastName" required/>
              <label class="floating-label">Apellidos</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial" >
              <select name="gender" class="form-control" required>
                <option value="">Seleccione un Genero</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
              </select>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="email" class="form-control" name="email" required/>
              <label class="floating-label">Email</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="phone" required/>
              <label class="floating-label">Telefono</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <select name="location" class="form-control" required>
                <option value="">Localidad donde vive</option>
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
              <select name="locationVote" class="form-control" required>
                <option value="">Localidad de su votación</option>
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
              <input type="text" class="form-control" name="neighborhood" required/>
              <label class="floating-label">Barrio</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Guardar</button>
          {!! Form::close() !!}

        </div>
      </div>
      </div>
      <div class="col-7" style="margin-top:10px;">


        <div class="panel">
          <div class="panel-body">
            <h4>Ministerio</h4>
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
              <thead>
                <tr>
                  <th>Cedula</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Email</th>
                  <th>Link</th>
                </tr>
              </thead>

              <tbody>
                @foreach($users as $u)
                <tr>
                  <td><a href="/administrator/users/{{Crypt::encrypt($u->id)}}">{{$u->identification}}</a></td>
                  <td>{{$u->name}}</td>
                  <td>{{$u->lastName}}</td>
                  <td>{{$u->email}}</td>

                  <td>
                    @if($u->level == 1728)

                    @else
                    <a href="/formulario/{{Crypt::encrypt($u->id)}}" target="_blank">
                      <button type="button" class="btn btn-primary">
                        <i class="icon fa-id-card-o" aria-hidden="true" style="font-size: 15px;"></i>
                      </button>
                    </a>
                    @endif

                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="panel">
          <div class="panel-body">
            <h4>Instrucciones</h4>
            <ul>
              <li>Diligenciar el formulario con Informacion real, de ser necesario tomese el tiempo de coseguir todos los datos.</li>
              <li>El cupo maximo para registrar son 12 personas (Su equipo de 12), si desea agregar mas personas comuniquese con su asistente.</li>
              <li>En la tabla superior encontrar los datos que ha registrado de su ministerio, cada usuario tiene un formulario <strong>unico y personal </strong> <i class="icon fa-id-card-o" aria-hidden="true" style="font-size: 15px;"></i> el cual usted debera compartir especificamente a ese discipulo para que el diligencia la información de su ministerio tal cual como usted lo ha realizado.</li>
              <li>Su ha ingresado algun dato incorrecto y desea editarlo porfavor comuniquese con la asistente de su ministerio</li>
              <li>El link del formulario sera generado hasta la linea de los 1728 del pastor Cesar Castellanos</li>
            </ul>
          </div>
        </div>
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
