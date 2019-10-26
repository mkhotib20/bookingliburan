<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketImage extends Model
{
    protected $table = 'img_paket';
    protected $primaryKey = 'id';
    protected $fillable = ['ip_paket', 'img'];
    protected $dates = ['created_at', 'updated_at'];
}
