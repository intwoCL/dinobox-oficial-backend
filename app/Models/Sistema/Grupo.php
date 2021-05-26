<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\Sistema\GrupoPresenter;


class Grupo extends Model
{
  use HasFactory;

  protected $table = 's_grupo';

  
  public function present(){
    return new GrupoPresenter($this);
  }

}
