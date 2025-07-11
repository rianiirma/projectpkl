<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
    'id', 
    'id_kelas', 
    'id_guru', 
    'id_mapel', 
    'hari', 
    'waktu_mulai', 
    'waktu_selesai', 
    'ruang '
];
    public $timestamp = true;

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }
}
