<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::with(['mahasiswa', 'prodi'])->latest()->get();
        return view('mata_kuliah.index', compact('mataKuliah'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        return view('mata_kuliah.create', compact('mahasiswa', 'prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mata_kuliah' => 'required',
            'sks'              => 'required|numeric',
            'mahasiswa_id'     => 'nullable|exists:mahasiswa,id',
            'prodi_id'         => 'nullable|exists:prodi,id',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('mata-kuliah.index')->with('success', 'Data Mata Kuliah berhasil disimpan!');
    }

    public function show(MataKuliah $mataKuliah)
    {
        return view('mata_kuliah.show', compact('mataKuliah'));
    }

    public function edit(MataKuliah $mataKuliah)
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        return view('mata_kuliah.edit', compact('mataKuliah', 'mahasiswa', 'prodi'));
    }

    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'nama_mata_kuliah' => 'required',
            'sks'              => 'required|numeric',
            'mahasiswa_id'     => 'nullable|exists:mahasiswa,id',
            'prodi_id'         => 'nullable|exists:prodi,id',
        ]);

        $mataKuliah->update($request->all());

        return redirect()->route('mata-kuliah.index')->with('success', 'Data Mata Kuliah berhasil diperbarui!');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();

        return redirect()->route('mata-kuliah.index')->with('success', 'Data Mata Kuliah berhasil dihapus!');
    }
}