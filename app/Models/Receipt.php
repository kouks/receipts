<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'value'
    ];

    /**
     * Receipt belongs to a household
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function household()
    {
        return $this->belongsTo(Household::class);
    }

    /**
     * Returns receipts relevant to supplied user ids
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function scopeBetweenUsers($builder, $ids)
    {
        return $builder->whereIn('user_id', $ids)->whereIn('issuer_id', $ids)->where('paid', 0);
    }

    /**
     * Receipt belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Receipt belongs to an issuer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function issuer()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Pay the receipt
     *
     * @return void
     */
    public function pay()
    {
        $this->paid = true;
        $this->save();
    }
}
