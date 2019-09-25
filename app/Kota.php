<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $primaryKey = 'id';
    protected $fillable = ['nama'];
    protected $dates = ['created_at', 'updated_at'];
    public function destinasi()
    {
        return $this->hasMany('destinnasi');
    }
}
