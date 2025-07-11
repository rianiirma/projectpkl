<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'id_siswa', 
        'id_jeniskeuangan', 
        'tanggal_bayar', 
        'jumlah', 
        'metode_pembayaran',
        'status'
    ];
    public $timestamps = true;

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function jeniskeuangan()
    {
        return $this->belongsTo(Jeniskeuangan::class, 'id_jeniskeuangan');
    }
}
