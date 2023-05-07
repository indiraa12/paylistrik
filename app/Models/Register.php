<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $filable = ['tarif_id', 'username', 'password', 'nomor_kwh', 'nama_pelanggan', 'alamat',];

}
