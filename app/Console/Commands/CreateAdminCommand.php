<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Hash;


use App\Models\User;
use Illuminate\Console\Command;
use PHPUnit\TextUI\Exception;
use Illuminate\Database\QueryException;

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
    protected $description = 'Create admin user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $admin = User::create([
                "email" => $this->option('email'),
                "name" => 'admin',
                "password" => Hash::make($this->option('email'))
            ]);
            $admin->assignRole('admin');
        } catch (QueryException) {
            echo "Admin record has not been added, An error happened !!! \n";
        }

        return 0;
    }
}
