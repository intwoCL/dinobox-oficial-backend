<?php

namespace App\Services;

class ConvertDatetime
{
  protected $date;

  public function __construct(string $date){
    $this->date = $date;
  }

  public function getDatetime(){
    return $this->format($this->date,'d-m-Y H:i');
  }

  public function getDate(){
    return $this->format($this->date,'d-m-Y');
  }

  public function getTime(){
    return $this->format($this->date,'H:i');
  }

  public function getDateTimeZ(){
    return $this->format($this->date,'Y-m-d H:i:s');
  }

  public function getDateFormatEmail(){
    // 1 5 March 2021 a las 9:16 pm
    return $this->getDateTimeFormat("j F Y") . " a las " . $this->getDateTimeFormat("g:i a");
  }

  public function getDateTimeFormat($format){
    return $this->format($this->date,$format);
  }

  // PRIVATE
  private function format($date, string $format){
    return date_format(date_create($date),$format);
  }
}
