<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'id_siswa', 
        'id_semester', 
        'jenis_penilaian', 
        'nilai',
        'keterangan'
    ];
    public $timestamps = true;

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester');
    }
}
