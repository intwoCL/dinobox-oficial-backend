<?php

namespace App\Services;

class GoogleMaps
{
  // https://www.google.com/maps/search/los%20crisantemo%20327,%20calera%20de%20tango,%20santiago
  private $MAPS = 'https://www.google.com/maps/search/';

  // lat = -33
  // lng = -70
  // https://www.google.com/maps/@-33.6278189,-70.7763168,15z
  private $MAPS_GEO = 'https://www.google.com/maps/@';

  protected $direccion; // direccion ####, comuna, region
  protected $location;  // [lat, lng]

  public function __construct($direccion, $location = []) {
    $this->direccion = urlencode($direccion);
    $this->location = $location;
  }

  public function search() {
    return "$this->MAPS$this->direccion";
  }

  public function location(){
    return "$this->MAPS_GEO$this->location[0],$this->locaation[1]";
  }
}
