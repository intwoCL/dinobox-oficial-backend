<?php

namespace App\Models\Sistema;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
  use Notifiable;

  protected $table = 's_admin';

  protected $guard = 'admin';

  protected $hidden = [
    'password',
  ];
}
