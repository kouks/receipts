<?php

namespace App\Core;

use App\Models\Household;
use Illuminate\Database\Eloquent\Collection;

class DebtCalculator
{
    /**
     * Calculates the amount of debt based on supplied receipts
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $receipts
     * @return float
     */
    public function forReceipts(Collection $receipts)
    {
        return array_reduce($receipts->toArray(), function ($carry, $receipt) {
            return $carry = auth()->user()->id === $receipt['issuer_id']
                ? $carry - $receipt['value']
                : $carry + $receipt['value'];
        });
    }
}
