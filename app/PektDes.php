<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PektDes extends Model
{
    protected $table = 'des_paket';
    protected $primaryKey = 'id';
    protected $fillable = ['dp_paket', 'dp_des'];
    protected $dates = ['created_at', 'updated_at'];
}
