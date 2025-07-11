<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama'];
    public $timestamp = true;

    public function jadwal()
    {
        return $this->hasMany(jadwal::class);
    }  
}
