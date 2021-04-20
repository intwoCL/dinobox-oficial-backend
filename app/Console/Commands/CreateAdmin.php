<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Sistema\Admin;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create only admin in system';

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
            $cont = Admin::count();
            if($cont==0){
                $admin = new Admin();
                $admin->username = "admin";
                $admin->password =  hash('sha256', "12345");
                $admin->nombre = "admin";
                $admin->correo = "admin@gmail.com";
                $admin->save();
                $this->info("Done!");
            }else{
                $this->info("Error admin exists!");
            }
        } catch (\Throwable $th) {
            $this->info("Error database!");
        }

    }
}
