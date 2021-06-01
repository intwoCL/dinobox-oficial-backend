<?php

namespace App\Models\Sistema;

use App\Presenters\Sistema\VehiculoPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
  use HasFactory;

  protected $table = 's_vehiculo';

  public function usuario(){
    return $this->belongsTo(User::class,'id_usuario');
  }

  public function present(){
    return new VehiculoPresenter($this);
  }

  public function getNombreHtml() {
    return "<strong>$this->patente</strong> -  ";
  }

  // $table->foreignId('id_usuario')->references('id')->on('s_usuario');
  // $table->string('patente');
  // $table->string('modelo');
  // $table->string('marca');
  // $table->integer('tipo');
  // $table->string('imagen')->nullable();
  // $table->boolean('favorito')->default(false);
  // $table->timestamps();
}
