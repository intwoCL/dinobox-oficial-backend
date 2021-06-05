<?php

namespace Database\Seeders;

use App\Models\Orden\Historial;
use Faker\Factory as Fake;

use App\Models\Orden\Orden;
use App\Models\Orden\OrdenRepartidor;
use App\Models\Sistema\Cliente;
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
      $c = Cliente::first();
      for ($i=1; $i < 100; $i++) {
        $o = new Orden();
        // $o->codigo_transaccion = 123456789010;
        $o->codigo = $i;
        $o->id_sucursal = 1;
        $o->id_usuario = 1;

        $o->fecha_entrega = date('Y-m-d');

        // $o->id_cliente = 1;
        if ($i%2 == 0) {
          $o->id_cliente = $c->id;
          $o->remitente_nombre = $c->nombre;
          $o->remitente_correo = $c->correo;
          $o->remitente_telefono = $c->telefono;
          $o->remitente_id_comuna = 1039;
        }else{
          $o->remitente_nombre = $faker->firstName;
          $o->remitente_correo = $faker->firstName."@mail.com";
          $o->remitente_telefono = "600800900";
          $o->remitente_id_comuna = 1039;
        }

        $o->remitente_direccion = $faker->streetName;
        $o->remitente_numero = $faker->numberBetween(1000,9999);
        $o->destinatario_nombre = $faker->firstName;
        $o->destinatario_direccion = $faker->streetName;
        $o->destinatario_numero = $faker->numberBetween(1000,9999);
        $o->destinatario_correo = $faker->firstName."@mail.com";
        $o->destinatario_telefono = "133131132";
        $o->destinatario_id_comuna = 1033;

        $o->mensaje = "Hola, feliz cumpleaños";
        $o->servicio = $i%2 == 0 ? 10 : 20;
        $o->categoria = $i%2 == 0 ? 10 : 20;
        $o->precio = $faker->numberBetween(1000,10000);;
        $o->save();
      }

      for ($i=1; $i < 20; $i++) {
        $r = new OrdenRepartidor();
        $r->id_usuario = 1;
        $r->id_repartidor = 4;
        $r->id_orden = $i;
        $r->posicion_retiro = $i;
        $r->posicion_despacho = $i;
        $r->save();

        $o = Orden::find($i);
        if ($o->categoria == 10) {
          $o->estado = 20;
        } else {
          $o->estado = 60;
        }
        $o->update();


        $historial = new Historial();
        $historial->id_orden = $o->id;
        $historial->id_repartidor = $r->id_repartidor;
        $historial->estado_orden = $o->estado;
        $historial->save();
      }
    }
}
