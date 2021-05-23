<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    $this->truncateTables([
      's_comuna',
      's_region',
      's_sistema',
      's_usuario',
      's_cliente',
      's_direccion',
      'or_orden',
      's_grupo',
      's_company',
    ]);

    Artisan::call('cities:import');

    $this->call(SistemaSeeder::class);
    $this->call(UserSeeder::class);

    Artisan::call('create:client');

    $this->call(OrdenSeeder::class);
  }


  public function truncateTables(array $tables)
  {
    DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    foreach ($tables as $table) {
      DB::table($table)->truncate();
    }
    DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
  }
}
