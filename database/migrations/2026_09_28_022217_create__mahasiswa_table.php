<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama_mahasiswa');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('foto_mahasiswa')->nullable();

            // Foreign Key ke Prodi (One to Many: Prodi -> Mahasiswa)
            $table->foreignId('prodi_id')->nullable()->constrained('prodi')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};