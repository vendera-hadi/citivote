<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'soeid', 'nickname', 'image', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeCandidate($query)
    {
        return $query->where('role_id', 3);
    }

    public function scopeMember($query)
    {
        return $query->where('role_id', 2);
    }

    public function votes()
    {
        return $this->hasMany('App\Models\Vote', 'candidate_id');
    }

    public function uservotes()
    {
        return $this->hasMany('App\Models\Vote', 'user_id');
    }

    public function photo()
    {
        return $this->hasOne('App\Models\UserPhoto', 'user_id');
    }

    public function role()
    {
       return $this->belongsTo('App\Models\Role');
    }
}
