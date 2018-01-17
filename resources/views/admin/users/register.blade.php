@extends('layouts.register')

@section('page_content')
 <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <!-- Page -->

  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <h2 class="register-title">Grupo {{$user->name}} {{$user->lastName}}</h2>
      <div class="row">
      <div class="col-5" style="margin-top:10px;">
      <div class="panel">

        <div class="panel-body">
          {!! Form::open(array('method' => 'POST','id' => 'formRegister' , 'enctype' => 'multipart/form-data')) !!}

            <input type="hidden" name="leader" value="{{$userId}}" />
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="identification" />
              <label class="floating-label">Identificacion</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="name"  />
              <label class="floating-label">Nombres</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="lastName" />
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
              <input type="email" class="form-control" name="email"/>
              <label class="floating-label">Email</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="phone" required/>
              <label class="floating-label">Telefono</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <select name="location" class="form-control">
                  <option value="">Localidad donde vive</option>
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
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <select name="locationVote" class="form-control">
                  <option value="">Localidad de su votación</option>
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
            <h4>Grupo</h4>
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
                  <td><a href="/formulario/{{Crypt::encrypt($u->id)}}">{{$u->identification}}</a></td>
                  <td>{{$u->name}}</td>
                  <td>{{$u->lastName}}</td>
                  <td>{{$u->email}}</td>

                  <td>
                    @if($u->level == 1728)
                    <a href="/formulario/{{Crypt::encrypt($u->id)}}" target="_blank">
                      <button type="button" class="btn btn-primary">
                        <i class="icon fa-id-card-o" aria-hidden="true" style="font-size: 15px;"></i> Contactos
                      </button>
                    </a>
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


@section('script_validation')
<script>
(function () {
    $('#formRegister').formValidation({
      framework: "bootstrap4",
      fields: {
        identification: {
          validators: {
            remote: {
                    url: '/check/user/',
                    message: 'Ya se ha registrado esta identificacion',
                    type: 'GET',
                    delay: 2000
   // Send Ajax request every 2 seconds
            },
            notEmpty: {
              message: 'Digite su Identificacion'
            }
          }
        },
        name: {
          validators: {
            notEmpty: {
              message: 'Digite sus Nombres'
            }
          }
        },
        lastName: {
          validators: {
            notEmpty: {
              message: 'Digite sus Apellidos'
            }
          }
        },
        phone: {
          validators: {
            notEmpty: {
              message: 'Digite su Telefono'
            }
          }
        },
        neighborhood: {
          validators: {
            notEmpty: {
              message: 'Digite su Barrio'
            }
          }
        },
        location: {
          validators: {
            notEmpty: {
              message: 'Seleccione la localidad donde vive'
            }
          }
        },
        locationVote: {
          validators: {
            notEmpty: {
              message: 'Seleccione la localidad donde vota'
            }
          }
        },

        email: {
          validators: {
            emailAddress: {
              message: 'El email que ha ingresado es invalido'
            }
          }
        },
        password: {
          validators: {
            notEmpty: {
              message: 'The password is required'
            },
            stringLength: {
              min: 8
            }
          }
        },
        birthday: {
          validators: {
            notEmpty: {
              message: 'The birthday is required'
            },
            date: {
              format: 'YYYY/MM/DD'
            }
          }
        },
        github: {
          validators: {
            url: {
              message: 'The url is not valid'
            }
          }
        },
        skills: {
          validators: {
            notEmpty: {
              message: 'The skills is required'
            },
            stringLength: {
              max: 300
            }
          }
        },
        porto_is: {
          validators: {
            notEmpty: {
              message: 'Please specify at least one'
            }
          }
        },
        'for[]': {
          validators: {
            notEmpty: {
              message: 'Please specify at least one'
            }
          }
        },
        company: {
          validators: {
            notEmpty: {
              message: 'Please company'
            }
          }
        },
        browsers: {
          validators: {
            notEmpty: {
              message: 'Please specify at least one browser you use daily for development'
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
