<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $table = 'harga';
    protected $primaryKey = 'h_id';
    protected $fillable = [
        'h_barcode','h_u_id','h_toko_id','h_create_date','h_price'
    ];
}

