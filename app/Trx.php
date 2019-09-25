<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trx extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['is_paid', 'kode_booking', 'user', 'tgl_brkt', 'paket', 'harga', 'jumlah_tim', 'meeting_point'];
    protected $dates = ['created_at', 'updated_at'];
}
