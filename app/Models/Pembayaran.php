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

    public function pelanggan()
    {
        return $this->belongsTo(TagihanPelanggan::class, 'pelanggan_id');
    }
}
