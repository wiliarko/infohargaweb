<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coba extends Model
{
    protected $table = 'coba';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama'
    ];
}
