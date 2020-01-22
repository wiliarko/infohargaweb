<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //
    protected $table = 'toko';
    protected $primaryKey = 't_id';
    protected $fillable = [
        't_id','t_name','t_long','t_lat','t_radius_toko'
    ];
}
