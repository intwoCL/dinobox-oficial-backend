<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
  use HasFactory;

  protected $table = 's_direccion';

  public function comuna(){
    return $this->belongsTo(Comuna::class,'id_comuna');
  }

  public function usuario(){
    return $this->belongsTo(User::class,'id_usuario');
  }

  public function getDireccion(){
    $d = $this->calle." ".$this->numero;
    $c = $this->comuna->nombre.", ".$this->comuna->region->nombre;
    return "$d, $c";
  }

  public function googleMap(){
    return "https://www.google.com/maps/search/".$this->getDireccion();
  }

  public function raw_info(){
    return [
      'id' => $this->id,
      'nombre' => $this->getDireccion(),
      'direccion' => $this->calle,
      'numero' => $this->numero,
      'comuna' => $this->comuna->nombre,
      'region' => $this->comuna->region->nombre,
    ];
  }
}
