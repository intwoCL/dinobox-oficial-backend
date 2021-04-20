<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Sistema\Admin;

class CreateAdminCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:custom {ops}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin custom profile';

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
            $option = $this->argument('ops');

            if($option=="admin"){
                $name = $this->ask('What is your name?');
                $username = $this->ask('What is your username?');
                $password = $this->secret('What is the password?');
                $email = $this->ask('What is the email?');
                $admin = new Admin();
                $admin->username = $username;
                $admin->password =  hash('sha256', $password);
                $admin->nombre = $name;
                $admin->correo = $email;
                $admin->save();
                $this->info("Done!");
            }else{
                $this->info("Error type");
            }
        } catch (\Throwable $th) {
            $this->info("Error arguments!");
        }
    }
}
