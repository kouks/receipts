<?php

namespace App\Policies;

use App\Models\Receipt;
use App\Models\Household;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReceiptPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view receipts.
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
     * Determine whether the user can create receipts.
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
     * Determine whether the user can delete the receipts.
     *
     * @param  App\User  $user
     * @param  App\Models\Receipt  $receipt
     * @param  App\Models\Household  $household
     * @return mixed
     */
    public function delete(User $user, Receipt $receipt, Household $household)
    {
        return $user->isInHousehold($household);
    }
}
