<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketPax extends Model
{
    
    protected $table = 'paket_pax';
    protected $primaryKey = 'pp_id';
    protected $fillable = ['pp_paket', 'pp_price', 'pp_pax'];
    protected $dates = ['created_at', 'updated_at'];
}
