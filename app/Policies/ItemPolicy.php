<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Household;
use App\Models\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the item.
     *
     * @param  App\User  $user
     * @param  App\Models\Hosehold  $household
     * @return mixed
     */
    public function view(User $user, Household $household)
    {
        return $user->isInHousehold($household);
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  App\User  $user
     * @param  App\Models\Hosehold  $household
     * @return mixed
     */
    public function create(User $user, Household $household)
    {
        return $user->isInHousehold($household);
    }

    /**
     * Determine whether the user can delete the item.
     *
     * @param  App\User  $user
     * @param  App\Item  $item
     * @param  App\Models\Hosehold  $household
     * @return mixed
     */
    public function delete(User $user, Household $household)
    {
        return $user->isInHousehold($household);
    }
}
