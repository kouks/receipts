<?php

namespace App\Models\Traits;

use App\Models\Household;

trait HouseholdActions
{
    /**
     * Checks whether the authed user is in a household
     *
     * @param  \App\Models\Household $household
     * @return bool
     */
    public function isInHousehold(Household $household)
    {
        return $household->users->contains(auth()->user());
    }

    /**
     * Checks whether the authed user owns given household
     *
     * @param  \App\Models\Household $household
     * @return bool
     */
    public function ownsHousehold(Household $household)
    {
        return $household->user->id == auth()->user()->id;
    }

    /**
     * Assings a household to authed user
     *
     * @param  array  $request
     * @return void
     */
    public function addHousehold(array $request)
    {
        $household = new Household($request);
        $household->slug = 'test';
        $household->user_id = $this->id;
        $household->save();
        $household->users()->attach($this);
    }

    /**
     * Let a user toggle their presence in a household
     *
     * @param  \App\Models\Household $household
     * @return bool
     */
    public function toggleHousehold(Household $household)
    {
        return $household->users()->toggle($this);
    }
}
