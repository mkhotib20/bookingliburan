<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama','alamat', 'hp', 'email'];
    protected $dates = ['created_at', 'updated_at'];
}
