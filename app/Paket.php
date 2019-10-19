<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id';
    protected $fillable = ['user', 'nama', 'durasi', 'desc', 'cover_img', 'kota'];
    protected $dates = ['created_at', 'updated_at'];
    
}
