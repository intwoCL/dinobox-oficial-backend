<?php

namespace Database\Seeders;

use App\Models\Sistema\Cliente;
use App\Models\Sistema\SucursalUsuario;
use App\Models\Sistema\Usuario;
use Illuminate\Database\Seeder;

use Faker\Factory as Fake;

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
      $faker = Fake::create();

      $password  = hash('sha256', '123456');

      $u = new Usuario();
      $u->username = "admin1";
      $u->password = $password;
      $u->nombre = "admin 1";
      $u->id_grupo = 1;
      $u->id_company = 1;
      $u->apellido = $faker->lastName;
      $u->correo = "admin@intwo.cl";
      $u->admin = true;
      $u->run = "19791763k";
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
      $u->id_grupo = 2;
      $u->id_company = 1;
      $u->apellido = $faker->lastName;
      $u->correo = "gestor@intwo.cl";
      $u->run = "204657830";
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
      $u->id_grupo = 2;
      $u->id_company = 1;
      $u->apellido = $faker->lastName;
      $u->correo = "empleado@intwo.cl";
      $u->run = "10469537K";
      $u->sexo = 1;
      $u->save();

      $su = new SucursalUsuario();
      $su->id_sucursal = 1;
      $su->id_usuario = $u->id;
      $su->rol = 2;
      $su->save();

      for ($i=1; $i < 100; $i++) {
        $u = new Usuario();
        $u->username = "repartidor$i";
        $u->password = $password;
        $u->nombre = $faker->firstName;
        $u->id_grupo = 3;
        $u->id_company = 1;
        $u->apellido = $faker->lastName;
        $u->correo = "$u->apellido"."$i@intwo.cl";
        $u->run = "123123123$i";
        $u->sexo = 2;
        $u->id_company = 1;
        $u->id_grupo = 1;
        $u->save();

        $su = new SucursalUsuario();
        $su->id_sucursal = 1;
        $su->id_usuario = $u->id;
        $su->rol = 3;
        $su->save();
      }

      $c = new Cliente();
      $c->run = "10000000";
      $c->password = $password;
      $c->nombre = $faker->firstName;
      $c->apellido = $faker->lastName;
      $c->correo = "cliente@intwo.cl";
      $c->save();
    }
}
