<?php

namespace App\Models\Traits;

use App\Models\Household;

trait ReceiptActions
{
    /**
     * User has many receipts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    /**
     * Decides whether a signed in user owns given receipt
     *
     * @param  \App\Models\Receipt $receipt
     * @return bool
     */
    public function ownsReceipt(Receipt $receipt)
    {
        return $this->id === $receipt->user->id;
    }

    /**
     * Make the user pay given receipt
     *
     * @param  \App\Models\Receipt $receipt
     * @return bool
     */
    public function payReceipt(Receipt $receipt)
    {
        return $this->paid()->attach($receipt);
    }

    /**
     * Decides whether the user has paid the given receipt
     *
     * @param  \App\Models\Receipt $receipt
     * @return bool
     */
    public function hasPaidReceipt(Receipt $receipt)
    {
        return $this->paid()->contains($receipt);
    }
}
