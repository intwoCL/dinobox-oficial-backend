<?php

namespace App\Services;

use DateTime;

class GoogleCalendar
{
  private $CALENDAR = 'http://www.google.com/calendar/event?action=TEMPLATE';

  protected $title;
  protected $description;
  protected $location;
  protected $dates;

  public function __construct($title, $description, $location, $dates, $url){
    $this->title = urlencode($title);
    $this->setDescription($description, $url);
    $this->location = urlencode($location);
    $this->setDates($dates);
  }

  public function build(){
    return "$this->CALENDAR&text=$this->title&dates=$this->dates&details=$this->description&location=$this->location&trp=false&sprop=&sprop=name:";
  }

  // PRIVATE

  private function setDescription($description, $url){
    $this->description = urlencode($description) . '<br><br><br><strong>WEB: </strong>' . urlencode($this->setUrl($url));
  }

  private function setUrl($url){
    return "<a href=\"$url\" target=\"_blank\" rel=\"noopener noreferrer\"> IR A LA AGENDA </a>";
  }

  private function setDates($dates){
    $start = new DateTime($dates.' '.date_default_timezone_get());
    $end = new DateTime($dates.' '.date_default_timezone_get());
    $end = $end->modify('+25 minutes');

    $this->dates = urlencode($start->format("Ymd\THis")) . "/" . urlencode($end->format("Ymd\THis"));
  }
}
