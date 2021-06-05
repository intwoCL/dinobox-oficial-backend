<?php

namespace Database\Seeders;

use App\Models\Sistema\Cliente;
use App\Models\Sistema\SucursalUsuario;
use App\Models\Sistema\Usuario;
use App\Models\Sistema\Vehiculo;
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

      $u = new Usuario();
      $u->username = "bemtorres";
      $u->password = $password;
      $u->nombre = 'Benjamin';
      $u->apellido = "Mora";
      $u->correo = "repartidor@dinobox.cl";
      $u->id_grupo = 3;
      $u->id_company = 1;
      $u->run = "1111111111";
      $u->sexo = 2;
      $u->save();

      $v = new Vehiculo();
      $v->id_usuario = $u->id;
      $v->patente = "AAA11";
      $d = rand (1,20);
      $a = $this->getMarcaAuto()[$d];
      $v->modelo = $a[0];
      $v->marca = $a[0];
      $v->tipo = $a[1];
      $v->save();

      $su = new SucursalUsuario();
      $su->id_sucursal = 1;
      $su->id_usuario = $u->id;
      $su->rol = 3;
      $su->save();

      for ($i=2; $i < 100; $i++) {
        $u = new Usuario();
        $u->username = "repartidor$i";
        $u->password = $password;
        $u->nombre = $faker->firstName;
        $u->apellido = $faker->lastName;
        $u->correo = "$u->apellido"."$i@intwo.cl";
        $u->run = "123123123$i";
        $u->sexo = 2;
        $u->id_company = 1;
        $u->id_grupo = 1;
        $u->save();


        $v = new Vehiculo();
        $v->id_usuario = $u->id;
        $v->patente = "AAA".$i;
        $d = rand (1,20);
        $a = $this->getMarcaAuto()[$d];
        $v->modelo = $a[0];
        $v->marca = $a[0];
        $v->tipo = $a[1];
        $v->save();

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

    private function getMarcaAuto() {
      return array(
        1 => ['BMW',2],
        2 => ['Mercedes-Benz',2],
        3 => ['Audi',2],
        4 => ['Lexus',2],
        5 => ['Renault',2],
        6 => ['Ford',2],
        7 => ['Opel',2],
        8 => ['Seat',2],
        9 => ['Honda Cargo 150',1],
        10 => ['Yamaha YB 125 Express',1],
        11 => ['Boxer 150 de Bajaj',1],
        12 => ['Bat de Carabela',1],
        13 => ['Suzuki Huracán 2021',1],
        14 => ['Huracán 2021',1],
        15 => ['Volkswagen Transporter',3],
        16 => ['Citroën Berlingo',3],
        17 => ['Peugeot Expert',3],
        18 => ['Volkswagen Nuevo Crafter',3],
        19 => ['Renault Trafic Furgón',3],
        20 => ['Volkswagen Nuevo Crafter',3],
      );
    }
}
