<template>
<div>
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
            <input type="text" class="form-control" placeholder="Ingrese el Rut Alumno..." maxlength="9" min="8" autocomplete="off" autofocus onkeyup="this.value = validarRut(this.value)" v-model="data.run"  v-on:keyup.enter="findUsers()">
            <span class="input-group-append">
              <button type="button" class="btn btn-success" @click="findUsers()">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>

          <div class="input-group mb-2" v-show="optionKey == 'nombre'">
            <label class="col-sm-4 col-form-label">Nombres</label>
            <input type="text" class="form-control" placeholder="Ingrese nombre..." autocomplete="off" v-model="data.nombre" v-on:keyup.enter="findUsers()">

            <span class="input-group-append">
              <button type="button" class="btn btn-success" @click="findUsers()">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>

          <div class="input-group mb-2" v-show="optionKey == 'apellido'">
            <label class="col-sm-4 col-form-label">Apellidos</label>
            <input type="text" class="form-control" placeholder="Ingrese apellido..." autocomplete="off" v-model="data.apellido" v-on:keyup.enter="findUsers()">
            <span class="input-group-append">
              <button type="button" class="btn btn-success" @click="findUsers()">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>

          <div class="input-group mb-2" v-show="optionKey == 'correo'">
            <label class="col-sm-4 col-form-label">Correo</label>
            <input type="text" class="form-control" placeholder="Ingrese correo..." autocomplete="off" v-model="data.correo" v-on:keyup.enter="findUsers()">
            <span class="input-group-append">
              <button type="button" class="btn btn-success" @click="findUsers()">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>

          <div class="input-group mb-2" v-show="isError">
            <p class="text-danger">No se encuentran coincidencias</p>
          </div>
          <div class="input-group mb-2" v-show="clientes.length > 0">
            <p class="text-success">Se han encontrado {{ clientes.length }} registros</p>
          </div>

          <div class="input-group table-responsive" v-show="clientes.length > 0" style="height: 400px;">
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
                <tr v-for="cliente in clientes" :key="cliente.id">
                  <td>{{ cliente.rut }}</td>
                  <td>{{ cliente.nombres }}</td>
                  <td>{{ cliente.correo }}</td>
                  <td>
                    <!-- <button class="btn btn-success btn-xs" v-on:click="select(cliente, 'cliente')">
                      SELECCIONAR
                    </button> -->
                    <button type="button" class="btn btn-primary btn-xs"  v-on:click="selectClient(cliente)"  data-toggle="modal" data-target="#modalComuna">
                      <i class="fa fa-search"></i>
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

  <div class="modal fade" id="modalComuna" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAccionLabel">USUARIO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="input-group table-responsive" v-show="clientes.length > 0" style="height: 400px;">
            <table id="tableSelect" class="table table-bordered table-hover table-sm text-center table-head-fixed">
              <thead>
              <tr>
                <th colspan="2">DIRECCIÓN</th>
                <!-- <th></th> -->
              </tr>
              </thead>
              <tbody>
                <tr v-for="direccion in cliente.direcciones" :key="direccion.id">
                  <td>{{ direccion.direccion }}</td>
                  <td>
                    <button class="btn btn-success btn-xs" v-on:click="select(cliente, direccion)">
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

</div>
</template>

<script>
  export default {
    props : ['postFind'],
    data(){
      return {
        optionKey: "run",
        data: {
          run: "",
          nombre: "",
          apellido: "",
          correo: ""
        },
        cliente: {
          direcciones: {}
        },
        clientes: [],
        isError: false,
      }
    },
    methods: {
      clear(){
        this.data.run = "";
        this.data.nombre = "";
        this.data.apellido = "";
        this.data.correo = "";
        this.isError = false;
        this.cliente = { direcciones: {}};
        this.clientes = [];
      },
      selectOption(event) {
        this.clear();
      },

      findUsers() {
        if (this.data.run || this.data.nombre || this.data.apellido || this.data.correo ) {
          axios
            .post(this.postFind, {
              option: this.optionKey,
              ...this.data
            }).then(response => {
              console.log(response.data);
              if (response.data.status != 402) {
                this.clientes = [];
                this.clientes = response.data.clientes;
              }else{
                this.isError = true;
              }
            }).catch(e => {
              console.log(e);
            });
        }
      },
      selectClient(cliente) {
        this.cliente = cliente;
      },
      select(cliente, comuna){
        this.clear();

        //crear funcion que retornara el usuario seleccionado
        userHandler(cliente, comuna);
      }
    }
  }
</script>
