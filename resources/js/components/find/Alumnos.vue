<template>
  <div class="row">
    <div class="col-lg-4 col-sm-12 col-sm-12">
      <div class="card my-4">
        <h5 class="card-header">Buscar</h5>
        <div class="card-body">
          <div class="input-group">
            <input type="text" v-model="run" class="form-control" v-bind:class="{ 'is-invalid' : error.length>0 }" placeholder="Ingrese el run" maxlength="9" min="8" autocomplete="off" autofocus v-on:keyup.enter="findStudent()">
            <span class="input-group-append">
              <button class="btn btn-primary" type="button" @click="findStudent()">Buscar</button>
            </span>
            <div class="invalid-feedback">
              {{ error }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-6 col-sm-6 col-md-4 mb-4" v-for="alumno in alumnos" v-bind:key="alumno.id">
          <div class="card border-0 shadow">
            <img :src="alumno.foto" class="card-img-top" height="200">
            <div class="card-body text-center">
              <h5 class="card-title mb-0">{{ alumno.nombres }}</h5>
              <div class="card-text text-black-50">{{ alumno.carrera }}</div>
              <small>{{ alumno.rut }}</small>
            </div>
            <div class="card-footer text-center">
              <button type="button" class="btn btn-sm btn-success"
                  data-toggle="modal"
                  data-target="#assignModal"
                  :data-alumno="`${ alumno.id }`">
                  Asignar
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="d-flex justify-content-center py-3">
            <i v-show="isSpinner" class="fa-5x fa fa-spinner fa-spin text-info"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props : ['postFind','propData'],
    data(){
      return {
        run: "",
        alumnos: [],
        error: "",
        isSpinner: false,
        count: -1
      }
    },
    methods: {
      findStudent() {
        this.alumnos = [];
        this.isSpinner = true;
        axios
          .post(this.postFind, {
            ...this.propData,
            run: this.run
          }).then(response => {
            this.reposenData(response.data);
          }).catch(e => {
            console.log(e);
          });
        this.run = "";
        this.isSpinner = false;
      },
      reposenData(data){
        if (data.status == 200) {
          this.alumnos = data.alumnos;
          this.error = "";
        } else {
          this.error = "Ya fue usado o fue seleccionado";
        }
      }

    }
  }
</script>
