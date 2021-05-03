<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
  use HasFactory;
  
  protected $table = 's_comuna';

  public function region(){
    return $this->belongsTo(Region::class,'id_region');
  }
}
