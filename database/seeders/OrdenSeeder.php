<?php

namespace Database\Seeders;

use Faker\Factory as Fake;

use App\Models\Orden\Orden;
use App\Models\Orden\OrdenRepartidor;
use Illuminate\Database\Seeder;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Fake::create();

      for ($i=2000; $i < 2010; $i++) {
        $o = new Orden();
        $o->codigo = $i . $faker->postcode;
        $o->codigo_transaccion = 123456789010;
        $o->fecha_entrega = date('Y-m-d');

        $o->remitente_nombre = $faker->firstName;
        $o->remitente_direccion = $faker->streetName . " " . $faker->buildingNumber;

        $o->destinatario_nombre = $faker->firstName;
        $o->destinatario_direccion = $faker->streetName . " " . $faker->buildingNumber;
        $o->destinatario_direccion = $faker->numberBetween(4000,9999);

        $o->save();
      }

      for ($i=1; $i < 5; $i++) {
        $r = new OrdenRepartidor();

        $r->id_usuario = 1;
        $r->id_repartidor = 4;
        $r->id_orden = $i;

        $r->save();
      }


    }
}
