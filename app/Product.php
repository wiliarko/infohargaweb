<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'p_id';
    protected $fillable = [
        'p_barcode','p_name','p_avatar','p_harga_standar'
    ];
}
