<?php

namespace App\Models;

use App\Models\Penggunaan;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $table = 'tagihan';
    protected $primaryKey = "id_tagihan";

    protected $fillable = [
        'id_tagihan', 'id_penggunaan', 'id_pelanggan', 'bulan', 'tahun', 'jumlah_meter', 'status'
    ];

    public function penggunaan()
    {
        return $this->belongsTo(Penggunaan::class, 'id_penggunaan');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
