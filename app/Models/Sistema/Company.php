<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\Sistema\CompanyPresenter;

class Company extends Model
{
  use HasFactory;

  protected $table = 's_company';

  public function present(){
    return new CompanyPresenter($this);
  }
}
