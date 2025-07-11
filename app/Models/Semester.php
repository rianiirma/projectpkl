<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Semester extends Model
{
    use HasFactory;

    protected $fillable = ['id','tahun_ajaran'];
    public $timestamp = true;

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
