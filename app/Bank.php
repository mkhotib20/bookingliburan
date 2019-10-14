<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank_account';
    protected $primaryKey = 'id';
    protected $fillable = ['bank_name','holder', 'rekening'];
    protected $dates = ['created_at', 'updated_at'];
}
