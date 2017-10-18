<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'passwordpharse',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $rules = [
        'username' => 'required|min:6|max:255|unique:users',
        'email' => 'required|email|min:6|max:255|unique:users',
        'password' => 'required|min:6|max:255',
        'passwordpharse' => 'required|min:6|max:255',
        'firstname' => 'required|min:3|max:255',
        'lastname' => 'required|min:3|max:255',
        'phone' => 'required|min:8|max:255',
        'branch' => 'required|max:255',
        'role' => 'required',
        'is_active' => 'required',
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const ROLE_ADMIN = 0;
    const ROLE_TEACHER = 1;

    public function his(){
        return $this->hasMany('App/HistoriesLogin','user_id');
    }
    public function grades(){
        return $this->hasMany('App/Grades','user_id');
    }
}
