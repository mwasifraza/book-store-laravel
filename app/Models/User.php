<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";

    public const ROLE_ADMIN = "admin";
    public const ROLE_USER = "user";

    public const MALE = "male";
    public const FEMALE = "female";

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

    protected $append = [
        'fullname',
    ];

    //accessor
    public function getFullnameAttribute(){
        return $this->firstname." ".$this->lastname;
    }

    // mutators
    // store names with first capital word
    public function setFirstnameAttribute($value){
        $this->attributes['firstname'] = ucwords($value);
    }
    public function setLastnameAttribute($value){
        $this->attributes['lastname'] = ucwords($value);
    }
}
