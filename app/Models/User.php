<?php

namespace App\Models;

use App\Notifications\MyResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password','role', 'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPasswordNotification($token, $this->email));
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function plans()
    {
        return $this->belongsToMany(Plan::class)->withPivot('start_date', 'end_date');
    }
    public function assignRole($role)
    {
        return $this->roles()->sync($role, false);
    }
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
    public function assignPlan(Plan $plan)
    {
        $now = Carbon::now();

        // Calculate the end date based on the membership's duration
        $endDate = $now->copy()->addDays($plan->duration_in_days);

        // Attach the membership to the user with start and end dates
        $this->memberships()->attach($plan->id, [
            'start_date' => $now,
            'end_date' => $endDate,
        ]);
    }
    public function assignTrialPlanToNewUser(User $user)
    {
        // Retrieve the "تجريبي" plan
        $trialPlan = Plan::where('name', 'تجريبي')->first();

        if (!$trialPlan) {
            // Handle the case where the plan doesn't exist
            return;
        }

        $now = Carbon::now();

        // Calculate the end date based on the plan's duration
        $endDate = $now->copy()->addDays($trialPlan->duration_in_days);

        // Attach the membership to the user with start and end dates
        $user->plans()->attach($trialPlan->id, [
            'start_date' => $now,
            'end_date' => $endDate,
        ]);
    }
    public function currentPlan()
    {
        $now = Carbon::now();

        // Retrieve the user's memberships where the current date is within the start and end dates
        return $this->plans()
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->first();
    }
public  function isPlanExpired()
{
    // Check if the user has any plans
    if (!$this->plans->isEmpty()) {
        $now = Carbon::now();

        // Retrieve the end date from the first plan's pivot table
        $endDate = $this->plans->first()->pivot->end_date;

        // Compare the end date with the current date
        return $now->greaterThan($endDate);
    }

    // If there are no plans, consider it as expired
    return true;
}
    public function daysLeftInCurrentPlan()
    {
        $currentPlan = $this->currentPlan();

        if ($currentPlan) {

            $now = Carbon::now();
            $endDate = Carbon::parse($currentPlan->pivot->end_date);

            // Calculate the difference in days between the end date and the current date
            return $now->diffInDays($endDate);
        }

        // If there's no current plan, return 0 or any other appropriate value
        return 0;
    }


}
