<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sistema\Grupo;
use App\Models\Sistema\Company;

class GrupoCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g = new Grupo();
        $g->id_sucursal = 1;
        $g->nombre = "Estrellitas";
        $g->save();

        $g = new Grupo();
        $g->id_sucursal = 1;
        $g->nombre = "Plantitas";
        $g->save();

        $g = new Grupo();
        $g->id_sucursal = 1;
        $g->nombre = "Repartidores";
        $g->save();

        $c = new Company();
        $c->id_sucursal = 1;
        $c->nombre = "Rappo";
        $c->save();

        $c = new Company();
        $c->id_sucursal = 1;
        $c->nombre = "Buber";
        $c->save();
    }
}
