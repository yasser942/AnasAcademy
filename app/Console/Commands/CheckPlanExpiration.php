<?php

namespace App\Console\Commands;

use App\Mail\ExpirationEmail;
use App\Models\User;
use App\Notifications\ExpiringPlanNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckPlanExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-plan-expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get users with plans that have exactly 3 days left
        $usersWithExpiringPlans = User::whereHas('plans', function ($query) {
            $query->where('end_date', '=', now()->addDays(5)->toDateString());
        })->get();


        foreach ($usersWithExpiringPlans as $user) {
            // Calculate the number of days left for each user's plan
            $daysLeft=$user->daysLeftInCurrentPlan();

            // Send an email to the user notifying them of the expiring plan
            Mail::to($user->email)->send(new ExpirationEmail( $daysLeft));
        }

        $this->info('Daily plan expiration check completed.');
    }
}
