@push('stylesheet')
<style>
  .card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
  }

  .card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
  }

  .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
  }

  .track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
  }

  .track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
  }

  .track .step.active:before {
    background: green;
  }

  .track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
  }

  .track .step.active .icon {
    background: red;
    color: #fff
  }

  .track .icon {
    display: inline-block;
    width: 60px;
    height: 60px;
    line-height: 70px;
    position: relative;
    border-radius: 100%;
    background: #ddd;
  }

  .track .step.active .text {
    font-weight: 400;
    color: #000
  }

  .track .text {
    display: block;
    margin-top: 7px
  }

  .img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
  }
</style>
@endpush


<div class="container py-2">
  <h2 class="font-weight-light text-center text-muted py-3">Bootstrap 4 Timeline</h2>

  <!-- timeline item 1 -->
  <div class="row">
      <!-- timeline item 1 left dot -->
      <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
              <div class="col">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
              <span class="badge badge-pill bg-light border">&nbsp;</span>
          </h5>
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
      </div>
      <!-- timeline item 1 event content -->
      <div class="col py-2">
          <div class="card">
              <div class="card-body">
                  <div class="float-right text-muted">Mon, Jan 9th 2020 7:00 AM</div>
                  <h4 class="card-title text-muted">Day 1 Orientation</h4>
                  <p class="card-text">Welcome to the campus, introduction and get started with the tour.</p>
              </div>
          </div>
      </div>
  </div>
  <!--/row-->
  <!-- timeline item 2 -->
  <div class="row">
      <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
              <span class="badge badge-pill bg-success">&nbsp;</span>
          </h5>
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
      </div>
      <div class="col py-2">
          <div class="card border-success shadow">
              <div class="card-body">
                  <div class="float-right text-success">Tue, Jan 10th 2019 8:30 AM</div>
                  <h4 class="card-title text-success">Day 2 Sessions</h4>
                  <p class="card-text">Sign-up for the lessons and speakers that coincide with your course syllabus. Meet and greet with instructors.</p>
                  <button class="btn btn-sm btn-outline-secondary" type="button" data-target="#t2_details" data-toggle="collapse">Show Details ▼</button>
                  <div class="collapse border" id="t2_details">
                      <div class="p-2 text-monospace">
                          <div>08:30 - 09:00 Breakfast in CR 2A</div>
                          <div>09:00 - 10:30 Live sessions in CR 3</div>
                          <div>10:30 - 10:45 Break</div>
                          <div>10:45 - 12:00 Live sessions in CR 3</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/row-->
  <!-- timeline item 3 -->
  <div class="row">
      <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
              <span class="badge badge-pill bg-light border">&nbsp;</span>
          </h5>
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
      </div>
      <div class="col py-2">
          <div class="card">
              <div class="card-body">
                  <div class="float-right text-muted">Wed, Jan 11th 2019 8:30 AM</div>
                  <h4 class="card-title">Day 3 Sessions</h4>
                  <p>Shoreditch vegan artisan Helvetica. Tattooed Codeply Echo Park Godard kogi, next level irony ennui twee squid fap selvage. Meggings flannel Brooklyn literally small batch, mumblecore PBR try-hard kale chips. Brooklyn vinyl lumbersexual
                      bicycle rights, viral fap cronut leggings squid chillwave pickled gentrify mustache. 3 wolf moon hashtag church-key Odd Future. Austin messenger bag normcore, Helvetica Williamsburg sartorial tote bag distillery Portland before
                      they sold out gastropub taxidermy Vice.</p>
              </div>
          </div>
      </div>
  </div>
  <!--/row-->
  <!-- timeline item 4 -->
  <div class="row">
      <div class="col-auto text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
              <span class="badge badge-pill bg-light border">&nbsp;</span>
          </h5>
          <div class="row h-50">
              <div class="col">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
      </div>
      <div class="col py-2">
          <div class="card">
              <div class="card-body">
                  <div class="float-right text-muted">Thu, Jan 12th 2019 11:30 AM</div>
                  <h4 class="card-title">Day 4 Wrap-up</h4>
                  <p>Join us for lunch in Bootsy's cafe across from the Campus Center.</p>
              </div>
          </div>
      </div>
  </div>
  <!--/row-->
</div>
<!--container-->

<hr>

<div class="container py-2">

  <!-- timeline item 1 -->
  <div class="row no-gutters">
      <div class="col-sm"> <!--spacer--> </div>
      <!-- timeline item 1 center dot -->
      <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
              <div class="col">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
              <span class="badge badge-pill bg-light border">&nbsp;</span>
          </h5>
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
      </div>
      <!-- timeline item 1 event content -->
      <div class="col-sm py-2">
          <div class="card">
              <div class="card-body">
                  <div class="float-right text-muted small">Jan 9th 2019 7:00 AM</div>
                  <h4 class="card-title text-muted">Day 1 Orientation</h4>
                  <p class="card-text">Welcome to the campus, introduction and get started with the tour.</p>
              </div>
          </div>
      </div>
  </div>
  <!--/row-->
  <!-- timeline item 2 -->
  <div class="row no-gutters">
      <div class="col-sm py-2">
          <div class="card border-success shadow">
              <div class="card-body">
                  <div class="float-right text-success small">Jan 10th 2019 8:30 AM</div>
                  <h4 class="card-title text-success">Day 2 Sessions</h4>
                  <p class="card-text">Sign-up for the lessons and speakers that coincide with your course syllabus. Meet and greet with instructors.</p>
                  <button class="btn btn-sm btn-outline-secondary" type="button" data-target="#t22_details" data-toggle="collapse">Show Details ▼</button>
                  <div class="collapse border" id="t22_details">
                      <div class="p-2 text-monospace">
                          <div>08:30 - 09:00 Breakfast in CR 2A</div>
                          <div>09:00 - 10:30 Live sessions in CR 3</div>
                          <div>10:30 - 10:45 Break</div>
                          <div>10:45 - 12:00 Live sessions in CR 3</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
              <span class="badge badge-pill bg-success">&nbsp;</span>
          </h5>
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
      </div>
      <div class="col-sm"> <!--spacer--> </div>
  </div>
  <!--/row-->
  <!-- timeline item 3 -->
  <div class="row no-gutters">
      <div class="col-sm"> <!--spacer--> </div>
      <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
          <h5 class="m-2">
              <span class="badge badge-pill bg-light border">&nbsp;</span>
          </h5>
          <div class="row h-50">
              <div class="col border-right">&nbsp;</div>
              <div class="col">&nbsp;</div>
          </div>
      </div>
      <div class="col-sm py-2">
          <div class="card">
              <div class="card-body">
                  <div class="float-right text-muted small">Jan 11th 2019 8:30 AM</div>
                  <h4 class="card-title">Day 3 Sessions</h4>
                  <p>Shoreditch vegan artisan Helvetica. Tattooed Codeply Echo Park Godard kogi, next level irony ennui twee squid fap selvage. Meggings flannel Brooklyn literally small batch, mumblecore PBR try-hard kale chips. Brooklyn vinyl lumbersexual
                      bicycle rights, viral fap cronut leggings squid chillwave pickled gentrify mustache.</p>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="container">
  <article class="card">
    <header class="card-header">
      Seguimiento de la orden
    </header>
    <div class="card-body">
      <h6>Código Orden: <strong>{{ $codigo }}</strong></h6>
      <article class="card">
        <div class="card-body row">
          <div class="col"> <strong>Fecha de Entrega:</strong> <br>
            {{ $orden->fecha_entrega }}
          </div>
          @if (current_client() && !empty($repartidor))
            <div class="col"> <strong>Repartidor:</strong> <br>
              {{$repartidor->present()->nombre_completo()}}
            </div>
          @endif
          <div class="col"> <strong>Estado:</strong> <br>
            {{ $orden->getEstado() }}
          </div>
          <div class="col"> <strong>Servicio:</strong> <br>
            {{ $orden->getServicio() }}
          </div>
          <div class="col"> <strong>Categoría:</strong> <br>
            {{ $orden->getCategoria() }}
          </div>
        </div>
      </article>
      <div class="track">
        @include('web.cliente.partials._estado')
      </div>
    </div>
  </article>
</div>