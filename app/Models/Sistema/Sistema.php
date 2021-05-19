<?php

namespace App\Models\Sistema;

use App\Casts\Json;
use App\Presenters\Sistema\SistemaPresenter;
use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{

  const COLOR_BASE = '#007bff';
  const COLOR_TEXT_BASE = '#fff';

	protected $table = 's_sistema';
	public $timestamps = false;

  protected $casts = [
    'config' => Json::class,
  ];

  public function present() {
    return new SistemaPresenter($this);
  }

  public function getLoginOscuro(){
    return $this->config['login_oscuro'] ?? false;
  }

  public function getPrimaryColor(){
    return $this->config['primary_color'] ?? self::COLOR_BASE;
  }

  public function getPrimaryColorText(){
    return $this->config['primary_color_text'] ?? self::COLOR_TEXT_BASE;
  }

  public function getSistemaColor(){
    return $this->config['sistema_color'] ?? self::COLOR_BASE;
  }

}
