<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            [
                'nama_mata_kuliah' => 'Pemrograman Web',
                'sks' => 3,
                'mahasiswa_id' => 1, 
                'prodi_id' => 1,     
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_mata_kuliah' => 'Basis Data',
                'sks' => 3,
                'mahasiswa_id' => 1, 
                'prodi_id' => 1,     
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}