<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jeniskeuangan extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama','deskripsi'];
    public $timestamp = true;

    public function keuangan()
    {
        return $this->hasMany(Keuangan::class);
    }
}
