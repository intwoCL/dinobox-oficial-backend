<?php

namespace App\Console\Commands;

use App\Models\Sistema\Alumno;
use App\Models\Sistema\Cliente;
use App\Models\Sistema\Direccion;
use Illuminate\Console\Command;

use Faker\Factory as Fake;

class AddClients extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:client';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

      $faker = Fake::create();
      $pass = "8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92";

      for ($i=0; $i < 100 ; $i++) {
        $c = new Cliente();
        $run = 100000010+$i;
        $c->run = $run;
        $c->password = $pass;
        $c->nombre = $faker->firstName;
        $c->apellido = $faker->lastName;
        $c->correo = $faker->unique()->safeEmail;
        $c->save();

        $d = new Direccion();
        $d->id_cliente = $c->id;
        $d->id_comuna = 1005;
        $d->calle = $faker->streetName;
        $d->numero = $faker->buildingNumber;
        $d->lat = $faker->latitude(-32,-34);
        $d->lng = $faker->longitude(-70,-71);
        $d->save();
      }
      $this->info("Done!");
    }
}
