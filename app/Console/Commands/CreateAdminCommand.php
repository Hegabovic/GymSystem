<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;


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
    public function handle(): int
    {
        try {
            $admin = User::create([
                "email" => $this->option('email'),
                "name" => 'admin',
                "password" => Hash::make($this->option('password'))
            ]);
            $admin->assignRole('Admin');
        } catch (QueryException) {
            echo "Admin record has not been added, An error happened !!! \n";
        }

        return 0;
    }
}
