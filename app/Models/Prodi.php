<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';

    protected $fillable = [
        'nama_prodi',
        'akreditasi',
        'foto_prodi',
    ];

    public function mahasiswa(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_id', 'id');
    }

    public function mataKuliah(): HasMany
    {
        return $this->hasMany(MataKuliah::class, 'prodi_id', 'id');
    }
}