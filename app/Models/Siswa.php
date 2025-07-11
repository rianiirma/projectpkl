<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_user',
        'id_kelas',
        'nisn',
        'nama',
        'alamat',
        'jenis_kelamin',
        'no_telepon',
        'foto',
    ];
    public $timestamps = true;

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function keuangan()
    {
        return $this->hasMany(Keuangan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

}
