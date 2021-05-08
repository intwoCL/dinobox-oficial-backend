<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\Sistema\SucursalPresenter;

class Sucursal extends Model
{
  protected $table = 's_sucursal';

  public function present(){
    return new SucursalPresenter($this);
  }
}
