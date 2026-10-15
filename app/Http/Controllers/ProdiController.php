<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::latest()->get();
        return view('prodi.index', compact('prodi'));
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'akreditasi' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_prodi')) {
            $data['foto_prodi'] = $request->file('foto_prodi')->store('uploads/prodi', 'public');
        }

        Prodi::create($data);

        return redirect()->route('prodi.index')->with('success', 'Data Prodi berhasil disimpan!');
    }

    public function show(Prodi $prodi)
    {
        return view('prodi.show', compact('prodi'));
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', compact('prodi'));
    }

    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'akreditasi' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_prodi')) {
            if ($prodi->foto_prodi && Storage::disk('public')->exists($prodi->foto_prodi)) {
                Storage::disk('public')->delete($prodi->foto_prodi);
            }
            $data['foto_prodi'] = $request->file('foto_prodi')->store('uploads/prodi', 'public');
        } else {
            unset($data['foto_prodi']);
        }

        $prodi->update($data);

        return redirect()->route('prodi.index')->with('success', 'Data Prodi berhasil diperbarui!');
    }

    public function destroy(Prodi $prodi)
    {
        if ($prodi->foto_prodi && Storage::disk('public')->exists($prodi->foto_prodi)) {
            Storage::disk('public')->delete($prodi->foto_prodi);
        }

        $prodi->delete();

        return redirect()->route('prodi.index')->with('success', 'Data Prodi berhasil dihapus!');
    }
}