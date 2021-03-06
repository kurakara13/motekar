<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = "users";
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'posisi', 'bp', 'status', 'unit'
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

    public function problem(){

      return $this->hasMany('App\Problem', 'user_id');
    }
    public function projects(){
      return $this->hasMany('App\Member', 'user_id');
      // return $this->hasMany('App\Project', 'project_owner');
    }
    public function members()
    {
      return $this->hasMany('App\Member', 'user_id');
    }
}
