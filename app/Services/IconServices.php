<?php

namespace App\Services;

use App\Lib\IconRender;
use App\Models\Sistema\Sistema;

class IconServices
{
  protected $name;
  private $color;

  // 14
  const NAMES = [
    'undraw_on_the_way',
    'undraw_order_delivered',
    'undraw_takeout_boxes',
    'undraw_drone_delivery',
    'undraw_operating',
    'undraw_team_page',
    'undraw_delivery',
    'undraw_deliveries',
    'undraw_two_factor',
    'undraw_work',
    'undraw_work_time',
    'undraw_work_together',
    'undraw_workers',
    'delivery_app',
  ];

  public function __construct($name = null){
    if (!empty($name)) { $this->name = $name; }
    $this->color = Sistema::first()->getSistemaColor();
  }

  public function getImagen() {
    if (empty($this->name)) { $this->name = self::NAMES[random_int(0, 13)]; }
    return $this->build();
  }

  // PRIVATE
  private function build() {
    return (new IconRender($this->name, $this->color))->getIMGBase64();
  }
}
