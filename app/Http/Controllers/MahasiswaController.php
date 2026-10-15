<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi')->latest()->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'            => 'required|unique:mahasiswa,nim',
            'nama_mahasiswa' => 'required',
            'jenis_kelamin'  => 'required',
            'alamat'         => 'required',
            'prodi_id'       => 'nullable|exists:prodi,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_mahasiswa')) {
            $data['foto_mahasiswa'] = $request->file('foto_mahasiswa')->store('uploads/mahasiswa', 'public');
        }

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil disimpan!');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim'            => 'required|unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama_mahasiswa' => 'required',
            'jenis_kelamin'  => 'required',
            'alamat'         => 'required',
            'prodi_id'       => 'nullable|exists:prodi,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_mahasiswa')) {
            if ($mahasiswa->foto_mahasiswa && Storage::disk('public')->exists($mahasiswa->foto_mahasiswa)) {
                Storage::disk('public')->delete($mahasiswa->foto_mahasiswa);
            }
            $data['foto_mahasiswa'] = $request->file('foto_mahasiswa')->store('uploads/mahasiswa', 'public');
        } else {
            unset($data['foto_mahasiswa']);
        }

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->foto_mahasiswa && Storage::disk('public')->exists($mahasiswa->foto_mahasiswa)) {
            Storage::disk('public')->delete($mahasiswa->foto_mahasiswa);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus!');
    }
}