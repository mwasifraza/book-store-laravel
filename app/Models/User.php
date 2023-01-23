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

    protected $table = "users";
    protected $primaryKey = "id";

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'username',
        'password',
        'role',
        'gender',
        'avatar'
    ];

    protected $attributes = [
        'role' => 'user',
        'avatar' => 'storage/user.png',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // mutators
    // store names with first capital word
    public function setFirstnameAttribute($value){
        $this->attributes['firstname'] = ucwords($value);
    }
    public function setLastnameAttribute($value){
        $this->attributes['lastname'] = ucwords($value);
    }
}
