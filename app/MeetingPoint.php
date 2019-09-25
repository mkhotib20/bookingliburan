<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingPoint extends Model
{
    protected $table = 'meeting_point';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'biaya'];
    protected $dates = ['created_at', 'updated_at'];
}
