<?php

namespace App\Console\Commands;

use App\Jobs\UpdateCustomerHobbiesJob;
use App\Models\Customer;
use Illuminate\Console\Command;

class DispatchHobbiesJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hobbies:dispatch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch the UpdateCustomerHobbiesJob';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $all_users_ids = Customer::all()->pluck('user_id')->toArray();

        foreach ($all_users_ids as $userId) {
            UpdateCustomerHobbiesJob::dispatch($userId);
        }

        return 0;
    }
}


