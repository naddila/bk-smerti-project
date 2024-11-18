<?php

namespace App\Http\Controllers;
use App\Models\Peraturan;

use Illuminate\Http\Request;

class PeraturanController extends Controller
{
    // Tampilkan daftar peraturan
    public function index()
    {
        $peraturan = Peraturan::paginate(100);
        return view('bk.page.peraturan.index', compact('peraturan'));
    }

    // Tampilkan form untuk menambah peraturan baru
    public function create()
    {
        return view('bk.page.peraturan.create');
    }

    // Simpan peraturan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'poin' => 'required|numeric',
            'jenis_peraturan_id' => 'required',
        ]);

        Peraturan::create($request->all());

        return redirect()->route('master-peraturan.index')->with('success', 'Peraturan berhasil ditambahkan.');
    }

    // Tampilkan form edit peraturan
    public function edit($id)
    {
        $peraturan = Peraturan::findOrFail($id);
        return view('bk.page.peraturan.edit', compact('peraturan'));
    }

    // Update peraturan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'poin' => 'required|numeric',
            'jenis_peraturan_id' => 'required',
        ]);

        $peraturan = Peraturan::findOrFail($id);
        $peraturan->update($request->all());

        return redirect()->route('master-peraturan.index')->with('success', 'Peraturan berhasil diperbarui.');
    }

    // Hapus peraturan
    public function destroy($id)
    {
        $peraturan = Peraturan::findOrFail($id);
        $peraturan->delete();

        return redirect()->route('master-peraturan.index')->with('success', 'Peraturan berhasil dihapus.');
    }
}

