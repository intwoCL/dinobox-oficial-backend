<?php

namespace Database\Seeders;

use App\Models\Sistema\Admin;
use App\Models\Sistema\Usuario;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Tabla de usuario

      $password  = hash('sha256', '000sys');

      $a = new Admin();
      $a->username = "admin000";
      $a->password = $password;
      $a->nombre = "Administrador plataforma";
      $a->correo = "contacto@edugestion.cl";
      $a->save();
    }
}
