<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Migrations\Migration;


class Player extends Model
{
    //
    protected $table = 'user';
    protected $primaryKey = 'u_id';
    protected $fillable = [
        'u_name','u_id','u_email','u_token_fcm','u_avatar'
    ];
}
