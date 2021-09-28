<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class storeclinic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gstin',
        'state',
        'country',
        'pincode'
    ];


    /**
     * Get the Store Admin of Store.
     *
     * @return \App\Models\User
     */
    public function getStoreAdminAttribute()
    {
        return $this->users()
                    ->where(function (Builder $query) {
                        return $query->whereHas('role', function(Builder $query1) {
                            return $query1->whereLabel('storeadmin');
                        });
                    })->first();
    }

     /**
     * Relationships
     */

    /**
     * Relationship between sites and users table.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'store_users');
    }
}
