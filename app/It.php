<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class It extends Model
{
    protected $table = 'itinerary';
    protected $primaryKey = 'id';
    protected $fillable = ['jadwal','paket', 'content'];
    protected $dates = ['created_at', 'updated_at'];
}
