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

  public function cliente(){
    return $this->belongsTo(Cliente::class,'id_cliente');
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
      'direccion' => $this->getDireccion(),
      'calle' => $this->calle,
      'numero' => $this->numero,
      'comuna' => $this->comuna->nombre,
      'region' => $this->comuna->region->nombre,
      'id_comuna' => $this->id_comuna,
      'id_region' => $this->comuna->id_region,
      'favorito' => $this->favorito ? true : false,
      'map' => [
        'lng' => $this->lng,
        'lat' => $this->lat,
      ],
    ];
  }
}
