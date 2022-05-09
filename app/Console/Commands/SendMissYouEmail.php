<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Notifications\MissYou;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendMissYouEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users-not-logged-in-for-month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends mails to users who were absent for a month';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lastDate = Carbon::now('Africa/Cairo')->subMonth();
        $customers = Customer::where('last_login', $lastDate)->get();
        echo $lastDate;
        foreach ($customers as $customer) {
            $customer->user->notify(new MissYou());
        }
        return 0;
    }
}
