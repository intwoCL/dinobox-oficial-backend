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
      's_admin',
      's_sistema',
      // 's_escuela',
      // 's_carrera',
      // 's_alumno',
    ]);

    $this->call(UserSeeder::class);
    $this->call(SistemaSeeder::class);
    // Artisan::call('edu:escuela');
    // Artisan::call('edu:carreras');
    // Artisan::call('edu:alumnos');
    Artisan::call('edugestion:import');
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
