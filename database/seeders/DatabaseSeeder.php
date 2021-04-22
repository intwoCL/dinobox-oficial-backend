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
      's_sistema',
      's_usuario',
      's_cliente',
    ]);

    $this->call(SistemaSeeder::class);
    $this->call(UserSeeder::class);
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
