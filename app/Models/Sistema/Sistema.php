<?php

namespace App\Models\Sistema;

use App\Casts\Json;
use App\Presenters\Sistema\SistemaPresenter;
use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
	protected $table = 's_sistema';
	public $timestamps = false;

  protected $casts = [
    'config' => Json::class,
  ];

  public function present() {
    return new SistemaPresenter($this);
  }


}
