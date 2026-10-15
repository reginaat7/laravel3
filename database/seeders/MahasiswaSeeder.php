<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'nim'            => '230001',
                'nama_mahasiswa' => 'Regina Attala Riswana',
                'jenis_kelamin'  => 'Perempuan',
                'alamat'         => 'Jl. Merdeka, Gang. Faroka, No. 52, Kab. Garut',
                'foto_mahasiswa' => 'uploads/mahasiswa/regina.jpg',
                'prodi_id'       => 1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}