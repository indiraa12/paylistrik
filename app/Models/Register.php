<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $filable = ['id_pelanggan', 'username', 'password', 'nomor_kwh', 'nama_pelanggan', 'alamat', 'id_tarif'];

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif');
    }
}
