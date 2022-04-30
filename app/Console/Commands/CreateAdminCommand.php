<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {--email=admin@admin.com} {--password=123456}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admin=User::create([
            "email"=>$this->option('email'),
            "name"=>'admin',
            "password"=>$this->option('password')
        ]);
        $admin->assignRole('admin');
        return 0;
    }
}
