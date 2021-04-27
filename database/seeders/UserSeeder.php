<?php

namespace Database\Seeders;

use App\Models\Sistema\Cliente;
use App\Models\Sistema\SucursalUsuario;
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

      $password  = hash('sha256', '123456');

      $u = new Usuario();
      $u->username = "admin1";
      $u->password = $password;
      $u->nombre = "admin 1";
      $u->apellido = "uno";
      $u->correo = "admin@intwo.cl";
      $u->admin = true;
      $u->save();

      $su = new SucursalUsuario();
      $su->id_sucursal = 1;
      $su->id_usuario = $u->id;
      $su->rol = 1;
      $su->save();

      $u = new Usuario();
      $u->username = "gestor";
      $u->password = $password;
      $u->nombre = "gestor";
      $u->apellido = "uno";
      $u->correo = "gestor@intwo.cl";
      $u->save();

      $su = new SucursalUsuario();
      $su->id_sucursal = 1;
      $su->id_usuario = $u->id;
      $su->rol = 1;
      $su->save();

      $u = new Usuario();
      $u->username = "empleado";
      $u->password = $password;
      $u->nombre = "empleado";
      $u->apellido = "uno";
      $u->correo = "empleado@intwo.cl";
      $u->save();

      $su = new SucursalUsuario();
      $su->id_sucursal = 1;
      $su->id_usuario = $u->id;
      $su->rol = 2;
      $su->save();

      $u = new Usuario();
      $u->username = "repartidor1";
      $u->password = $password;
      $u->nombre = "repartidor 1";
      $u->apellido = "uno";
      $u->correo = "repartidor1@intwo.cl";
      $u->save();

      $su = new SucursalUsuario();
      $su->id_sucursal = 1;
      $su->id_usuario = $u->id;
      $su->rol = 3;
      $su->save();

      $c = new Cliente();
      $c->uid = "INTWO2000001";
      $c->run = "10000000";
      $c->password = $password;
      $c->nombre = "nombre";
      $c->apellido = "apellido";
      $c->correo = "cliente@intwo.cl";
      $c->save();
    }
}