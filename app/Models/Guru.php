<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['id','id_user','nama','no_telepon','foto','mapel_utama'];
    public $timestamp = true;

    public function kelas()
    {
        return $this->hasMany(kelas::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
