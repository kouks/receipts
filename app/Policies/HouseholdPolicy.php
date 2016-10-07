<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Household;
use Illuminate\Auth\Access\HandlesAuthorization;

class HouseholdPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the household.
     *
     * @param  App\User  $user
     * @param  App\Household  $household
     * @return mixed
     */
    public function view(User $user, Household $household)
    {
        return $user->isInHousehold($household);
    }

    /**
     * Determine whether the user can manage the household.
     *
     * @param  App\User  $user
     * @param  App\Household  $household
     * @return mixed
     */
    public function manage(User $user, Household $household)
    {
        return $user->ownsHousehold($household);
    }
}
