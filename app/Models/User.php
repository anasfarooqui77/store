<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationships
     */

     /**
     * Relationship between users and sites table.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function storeclinics()
    {
        return $this->belongsToMany('App\Models\Storeclinic', 'store_users');
    }



    /**
     * Relationship between users and roles table.
     *
     * @return \App\Models\Role
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

     /**
     * Find out if the user has any of the given roles or not.
     *
     * @param  array  $roles
     * @return boolean
     */
    public function hasRole($roles) 
    {
        if(in_array($this->role->label, $roles))
            return true;
        else
            return false;
    }
}
