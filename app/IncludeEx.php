<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncludeEx extends Model
{
    protected $table = 'prev';
    protected $primaryKey = 'id';
    protected $fillable = ['name','is_include', 'paket'];
    protected $dates = ['created_at', 'updated_at'];
}
