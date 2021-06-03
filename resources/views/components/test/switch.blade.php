<style>
  /* The switch - the box around the slider */
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    float:right;
  }

  /* Hide default HTML checkbox */
  .switch input {display:none;}

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input.default:checked + .slider {
    background-color: #444;
  }
  input.primary:checked + .slider {
    background-color: #2196F3;
  }
  input.success:checked + .slider {
    background-color: #8bc34a;
  }
  input.info:checked + .slider {
    background-color: #3de0f5;
  }
  input.warning:checked + .slider {
    background-color: #FFC107;
  }
  input.danger:checked + .slider {
    background-color: #f44336;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>



<div class="col-md-6">
  <div class="card" style="margin:50px 0">
  <!-- Default panel contents -->
    <div class="card-header">Checkbox to Switch</div>

    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        Bootstrap Switch Default
        <label class="switch ">
          <input type="checkbox" class="default">
          <span class="slider"></span>
        </label>
      </li>
      <li class="list-group-item">
        Bootstrap Switch Primary
        <label class="switch ">
          <input type="checkbox" class="primary">
          <span class="slider"></span>
        </label>
      </li>
      <li class="list-group-item">
        Bootstrap Switch Success
        <label class="switch ">
          <input type="checkbox" class="success">
          <span class="slider"></span>
        </label>
      </li>
      <li class="list-group-item">
        Bootstrap Switch Info
        <label class="switch ">
          <input type="checkbox" class="info">
          <span class="slider"></span>
        </label>
      </li>
      <li class="list-group-item">
        Bootstrap Switch Warning
        <label class="switch ">
          <input type="checkbox" class="warning">
          <span class="slider"></span>
        </label>
      </li>
      <li class="list-group-item">
        Bootstrap Switch Danger
        <label class="switch ">
          <input type="checkbox" class="danger">
          <span class="slider"></span>
        </label>
      </li>
    </ul>
    </div>
    </div>
    <div class="col-md-6">
    <div class="card" style="margin:50px 0">
    <!-- Default panel contents -->


    <div class="card-header">Checkbox to Round Switch</div>

    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        Bootstrap Switch Default
        <label class="switch ">
          <input type="checkbox" class="default">
          <span class="slider round"></span>
        </label>
      </li>
      <li class="list-group-item">
        Bootstrap Switch Primary
        <label class="switch ">
          <input type="checkbox" class="primary">
          <span class="slider round"></span>
        </label>
      </li>
      <li class="list-group-item">
        Bootstrap Switch Success
        <label class="switch ">
          <input type="checkbox" class="success">
          <span class="slider round"></span>
        </label>
      </li>
      <li class="list-group-item">
        Bootstrap Switch Info
        <label class="switch ">
          <input type="checkbox" class="info">
          <span class="slider round"></span>
        </label>
      </li>
      <li class="list-group-item">
        Bootstrap Switch Warning
        <label class="switch ">
          <input type="checkbox" class="warning">
          <span class="slider round"></span>
        </label>
      </li>
      <li class="list-group-item">
        Bootstrap Switch Danger
        <label class="switch ">
          <input type="checkbox" class="danger">
          <span class="slider round"></span>
        </label>
      </li>
    </ul>
  </div>
</div>
