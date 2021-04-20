<template>
  <div class="modal fade" id="modalFind" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6>Búsqueda personalizada</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row" v-if="isFindUser">
            <label class="col-sm-4 col-form-label">Tipo de usuario</label>
            <div class="input-group col-sm-8">
              <select class="form-control" @change="selectOption($event)" v-model="optionKeyUser">
                <option value="alumno">Alumnos</option>
                <option value="usuario">Usuarios</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Búsqueda</label>
            <div class="input-group col-sm-8">
              <select class="form-control" @change="selectOption($event)" v-model="optionKey">
                <option value="run">Rut</option>
                <option value="nombre">Nombres</option>
                <option value="apellido">Apellidos</option>
                <option value="correo">Correo</option>
              </select>
            </div>
          </div>

          <div class="input-group mb-2" v-show="optionKey == 'run'">
            <label class="col-sm-4 col-form-label">Rut</label>
            <input type="text" class="form-control" placeholder="Ingrese el Rut Alumno..." maxlength="9" min="8" autocomplete="off" autofocus onkeyup="this.value = validarRut(this.value)" v-model="data.run"  v-on:keyup.enter="findAlumno()">
            <span class="input-group-append">
              <button type="button" class="btn btn-success" @click="findAlumno()">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>

          <div class="input-group mb-2" v-show="optionKey == 'nombre'">

            <label class="col-sm-4 col-form-label">Nombres</label>
            <input type="text" class="form-control" placeholder="Ingrese nombre..." autocomplete="off" v-model="data.nombre" v-on:keyup.enter="findAlumno()">

            <span class="input-group-append">
              <button type="button" class="btn btn-success" @click="findAlumno()">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>

          <div class="input-group mb-2" v-show="optionKey == 'apellido'">
            <label class="col-sm-4 col-form-label">Apellidos</label>
            <input type="text" class="form-control" placeholder="Ingrese apellido..." autocomplete="off" v-model="data.apellido" v-on:keyup.enter="findAlumno()">
            <span class="input-group-append">
              <button type="button" class="btn btn-success" @click="findAlumno()">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>

          <div class="input-group mb-2" v-show="optionKey == 'correo'">
            <label class="col-sm-4 col-form-label">Correo</label>
            <input type="text" class="form-control" placeholder="Ingrese correo..." autocomplete="off" v-model="data.correo" v-on:keyup.enter="findAlumno()">
            <span class="input-group-append">
              <button type="button" class="btn btn-success" @click="findAlumno()">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>

          <div class="input-group mb-2" v-show="isError">
            <p class="text-danger">No se encuentran coincidencias</p>
          </div>
          <div class="input-group mb-2" v-show="alumnos.length > 0">
            <p class="text-success">Se han encontrado {{ alumnos.length }} registros</p>
          </div>
          <div class="input-group table-responsive" v-show="alumnos.length > 0" style="height: 400px;">
            <table id="tableSelect" class="table table-bordered table-hover table-sm text-center table-head-fixed">
              <thead>
              <tr>
                <th>RUT</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>CARRERA</th>
                <th>JORNADA</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                <tr v-for="alumno in alumnos" :key="alumno.id">
                  <td>{{ alumno.rut }}</td>
                  <td>{{ alumno.nombres }}</td>
                  <td>{{ alumno.correo }}</td>
                  <td><small>{{ alumno.carrera }}</small></td>
                  <td>{{ alumno.jornada }}</td>
                  <td>
                    <button class="btn btn-success btn-xs" v-on:click="select(alumno)">
                      SELECCIONAR
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="input-group table-responsive" v-show="usuarios.length > 0" style="height: 400px;">
            <table id="tableSelect" class="table table-bordered table-hover table-sm text-center table-head-fixed">
              <thead>
              <tr>
                <th>RUT</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>TTIPO USUARIO</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                <tr v-for="usuario in usuarios" :key="usuario.id">
                  <td>{{ usuario.rut }}</td>
                  <td>{{ usuario.nombres }}</td>
                  <td>{{ usuario.correo }}</td>
                  <td>{{ usuario.tipo }}</td>
                  <td>
                    <button class="btn btn-success btn-xs" v-on:click="select(usuario, 'usuario')">
                      SELECCIONAR
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props : ['postFind','findUsuario'],
    data(){
      return {
        optionKeyUser: "alumno",
        optionKey: "run",
        data: {
          run: "",
          nombre: "",
          apellido: "",
          correo: ""
        },
        alumnos: [],
        usuarios: [],
        isError: false,
        isFindUser: false,
      }
    },
    created() {
      this.isFindUser = this.findUsuario == 'true' ? true : false;
    },
    methods: {
      selectOption(event) {
        this.data.run = "";
        this.data.nombre = "";
        this.data.apellido = "";
        this.data.correo = "";
        this.isError = false;
        this.alumnos = [];
        this.usuarios = [];
      },

      findAlumno(){
        if (this.data.run || this.data.nombre || this.data.apellido || this.data.correo ) {
          axios
            .post(this.postFind, {
              option: this.optionKey,
              type: this.optionKeyUser,
              ...this.data
            }).then(response => {
              if (response.data.status != 402) {
                this.alumnos = [];
                this.usuarios = [];

                if(this.optionKeyUser == "alumno"){
                  this.alumnos = response.data.alumnos;
                }else{
                  this.usuarios = response.data.usuarios;
                }
              }else{
                this.isError = true;
              }
            }).catch(e => {
              console.log(e);
            });
        }
      },

      select(usuario, tipo = "alumno"){
        this.isError = false;
        this.alumnos = [];
        this.usuarios = [];
        this.data.run = "";
        this.data.nombre = "";
        this.data.apellido = "";
        this.data.correo = "";

        //crear funcion que retornara el usuario seleccionado
        userHandler(usuario, tipo);
      }
    }
  }
</script>
