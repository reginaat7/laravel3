<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('prodi')->insert([
            [
                'nama_prodi' => 'Teknik Informatika',
                'akreditasi' => 'Unggul',
                'foto_prodi' => 'uploads/prodi/ti.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_prodi' => 'Sistem Informasi',
                'akreditasi' => 'Baik Sekali',
                'foto_prodi' => 'uploads/prodi/si.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}