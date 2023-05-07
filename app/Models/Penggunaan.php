<?php

namespace App\Models;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;
    protected $table = 'penggunaan';

    protected $fillable = [
        'user_id', 'bulan', 'tahun', 'meter_awal', 'meter_akhir', 'id_tarif'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
