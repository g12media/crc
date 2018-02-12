@extends('layouts.register')

@section('page_content')
 <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <!-- Page -->

  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <h2 class="register-title">Registro</h2>
      <div class="panel">
        <div class="panel-body">
          {!! Form::open(array('method' => 'POST','id' => 'formRegister' , 'enctype' => 'multipart/form-data')) !!}
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="number" class="form-control" name="identification" />
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
              <select name="city" class="form-control" id="city" onchange="selectCity()">
                  <option value="">Seleccione una ciudad</option>
                  <option value="Bogota">Bogota</option>
                  <option value="Medellin">	Medellin</option>
                  <option value="Cali">Cali</option>
                  <option value="Barranquilla">Barranquilla</option>
                  <option value="Cartagena de Indias">Cartagena de Indias</option>
                  <option value="Soledad">Soledad</option>
                  <option value="Cucuta">Cucuta</option>
                  <option value="Ibague">Ibague</option>
                  <option value="Santa Marta">Santa Marta</option>
                  <option value="Villavicencio">Villavicencio</option>
                  <option value="Bello">Bello</option>
                  <option value="Valledupar">Valledupar</option>
                  <option value="Pereira">Pereira</option>
                  <option value="Buenaventura">Buenaventura</option>
                  <option value="Pasto">Pasto</option>
                  <option value="Manizales">Manizales</option>
                  <option value="Neiva">Neiva</option>
                  <option value="Bucaramanga">Bucaramanga</option>
              </select>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="department" required/>
              <label class="floating-label">Departamento</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="city" required/>
              <label class="floating-label">Ciudad o Municipio</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="neighborhood" required/>
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


@section('script_validation')
<script>

function selectCity(){
    var citySelect = document.getElementById("city").value;
    if(citySelect == 'Bogota'){
    $("#locationVote").fadeIn();
    $("#location").fadeIn();
  }else{
    $("#locationVote").fadeOut();
    $("#location").fadeOut();
  }
}


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
