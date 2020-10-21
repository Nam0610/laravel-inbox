<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table='users';
    protected $fillable=['id','name','email','email_verified_at','password'];

}
