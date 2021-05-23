<?php

namespace Database\Seeders;

use App\Models\Sistema\Company;
use App\Models\Sistema\Grupo;
use App\Models\Sistema\Sistema;
use App\Models\Sistema\Sucursal;
use Illuminate\Database\Seeder;

class SistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $s = new Sistema();
      $s->titulo = "Dinobox";
      $s->save();

      $s = new Sucursal();
      $s->nombre = "principal";
      $s->codigo = "www";
      $s->save();


      $c = new Company();
      $c->nombre = "intwo";
      $c->id_sucursal = 1;
      $c->save();

      $c = new Company();
      $c->id_sucursal = 1;
      $c->nombre = "edugestion";
      $c->save();

      $g = new Grupo();
      $g->id_sucursal = 1;
      $g->nombre = "los mejores";
      $g->save();
    }
}
