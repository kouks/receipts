<?php

namespace App\Models;

use App\Models\Contracts\Urlable;
use App\Support\UrlBuilder;
use Illuminate\Database\Eloquent\Model;

class Household extends Model implements Urlable
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'slug'];

	/**
	 * Household belongs to many users
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

	/**
	 * Household belongs to a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

	/**
	 * Household has many receipts
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function receipts()
    {
    	return $this->hasMany(Receipt::class);
    }

    /**
     * Household has many item in its cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart()
    {
        return $this->hasMany(Item::class);
    }

	/**
	 * Add a new receipt to a household and assing it to the logged in user
     *
	 * @param  \App\Models\User  $user
	 * @param  array 			 $data
	 * @return void
	 */
    public function addReceipt(array $data)
    {
        foreach ($data['against'] as $userId) {
        	$receipt 				= new Receipt;

        	$receipt->name 	        = $data['name'];
        	$receipt->description	= $data['description'];
        	$receipt->value 	    = $data['value'] / (count($data['against']) + 1);
        	$receipt->issuer_id 	= auth()->user()->id;
            $receipt->user_id 	    = $userId;
        	$receipt->household_id 	= $this->id;

        	$receipt->save();
        }
    }

    /**
     * Returns the count of members in a household
     *
     * @return int
     */
    public function countMembers()
    {
        return $this->users->count();
    }

    /**
     * Make user add an item to the cart of a household
     *
     * @param \App\Models\Household  $household
     * @param  array  $data
     * @return bool
     */
    public function addItemToCart(array $data)
    {
        $item = new Item($data);

        $item->user_id = auth()->user()->id;
        $item->household_id = $this->id;

        return $item->save();
    }

    /**  
     * @inheritdoc 
     */
    public function parent()
    {
        return '';
    }

    /**  
     * @inheritdoc 
     */
    public function url()
    {
        return new UrlBuilder($this);
    }
}
