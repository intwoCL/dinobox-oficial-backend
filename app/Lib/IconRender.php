<?php
namespace App\Lib;

class IconRender {
  private $name;
  private $icons;
  private $new_color;
  private $base_color = "#ff9b00";

  public function __construct($name, $new_color = null) {
    $this->name = $name;
    $this->new_color = $new_color;
    $this->icons = new Icons();
  }

  public function getSVG() {
    return $this->new_color ? $this->changeColor() : $this->getIcons();
  }

  public function getIMGBase64() {
    return $this->new_color ? $this->convertToBase64($this->changeColor()) : $this->getIcons();
  }

  private function getIcons() {
    return $this->icons->getIcons()[$this->name];
  }

  private function changeColor() {
    return str_replace($this->base_color, $this->new_color, $this->getIcons());
  }

  private function convertToBase64($img) {
    return "data:image/svg+xml;base64," . base64_encode($img);
  }
}
