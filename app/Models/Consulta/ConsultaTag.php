<?php

namespace App\Models\Consulta;

use Illuminate\Database\Eloquent\Model;

class ConsultaTag extends Model
{
  protected $table = 'co_consulta_tags';

  public function tag(){
      return $this->belongsTo(Tag::class,'id_tags','id');
  }
}
