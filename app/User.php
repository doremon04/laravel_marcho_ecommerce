<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getShortName() {
        $name = auth()->user()->name;

        $arr_name = explode(' ', $name);

        return array_pop($arr_name);
    }

    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'model_has_roles', 'model_id', 'role_id');
    }
}
