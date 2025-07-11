<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama'];
    public $timestamp = true;

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
