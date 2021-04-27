<?php

namespace Database\Seeders;

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
      $s->titulo = "Edugestion";
      $s->save();

      $s = new Sucursal();
      $s->nombre = "principal";
      $s->codigo = "www";
      $s->save();
    }
}
