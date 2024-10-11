<?php

namespace App\Console\Commands;

use App\Jobs\UpdateCustomerHobbiesJob;
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
        $userIds = [1,2,3,4];

        foreach ($userIds as $userId) {
            UpdateCustomerHobbiesJob::dispatch($userId);
        }

        return 0;
    }
}


