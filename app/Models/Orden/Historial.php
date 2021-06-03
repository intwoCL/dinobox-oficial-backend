<?php

namespace App\Models\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\ConvertDatetime;

class Historial extends Model
{
  use HasFactory;

  protected $table = 'or_historial';

  public function getFechaEmision() {
    return new ConvertDatetime($this->created_at);
  }
}
