<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanPelanggan extends Model
{
    use HasFactory;
    protected $table = 'tagihan';
    protected $dates = ['bulan'];

    protected $fillable = [
        'penggunaan_id', 'user_id', 'bulan', 'tahun', 'jumlah_meter', 'status'
    ];

    public function penggunaan()
    {
        return $this->belongsTo(Penggunaan::class, 'penggunaan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
