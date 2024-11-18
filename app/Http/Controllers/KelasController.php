<?php

namespace App\Http\Controllers;
use App\Models\Kelas;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Menampilkan daftar kelas
    public function index()
    {
        $kelas = Kelas::paginate(10000);
        return view('bk.page.kelas.index', compact('kelas'));
    }

    // Menampilkan form untuk menambahkan kelas
    public function create()
    {
        return view('bk.page.kelas.create');
    }

    // Menyimpan data kelas yang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()->route('master-kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kelas
    public function edit(Kelas $kelas)
    {
        return view('bk.page.kelas.edit', compact('kelas'));
    }

    // Memperbarui data kelas
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()->route('master-kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    // Menghapus kelas
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('master-kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}

