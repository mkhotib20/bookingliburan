<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $table = 'destinasi';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','tiket', 'des_kota', 'deskripsi'];
    protected $dates = ['created_at', 'updated_at'];
    public function kota()
    {
        return $this->belongsTo('kota');
    }
}
