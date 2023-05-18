<?php

namespace App\Models;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $guarded = [];
    protected $dates = ['tanggal_pembayaran'];

    public function tagihan()
    {
        return $this->belongsTo(TagihanPelanggan::class, 'tagihan_id', 'id');
    }
}