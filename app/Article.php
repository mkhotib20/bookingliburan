<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'id';
    protected $fillable = ['title','slug','content', 'cover_img', 'views'];
    protected $dates = ['created_at', 'updated_at'];
}
