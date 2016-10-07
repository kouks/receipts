<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'priority'];

    /**
     * Item belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Item belongs to a household
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
