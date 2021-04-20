<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'edugestion:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import file .sql';

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
        try {
            DB::unprepared(file_get_contents('database/import/sql_sedes.sql'));
            DB::unprepared(file_get_contents('database/import/sql_tipo_usuario.sql'));
            DB::unprepared(file_get_contents('database/import/sql_tipo_visitas.sql'));
            $this->info("Import completed!");
        } catch (\Throwable $th) {
            $this->info("Error. " . $th);
        }

    }
}
