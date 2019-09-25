<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDes extends Model
{
    protected $table = 'item_des';
    protected $primaryKey = 'id';
    protected $fillable = ['trx_id', 'des_code'];
    protected $dates = ['created_at', 'updated_at'];
}
