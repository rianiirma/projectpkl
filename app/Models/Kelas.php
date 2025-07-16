<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'id_jurusan', 'nomor_kelas', 'kapasitas', 'id_guru'];
    public $timestamp = true;

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

}
