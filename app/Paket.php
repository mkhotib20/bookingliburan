<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'harga', 'kuota', 'desc'];
    protected $dates = ['created_at', 'updated_at'];
    
}
