<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kelas;
use App\Models\User;
use App\Models\History;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BKController extends Controller
{
    // master siswa
    public function daftar_siswa()
    {
        if (request('kelas')) {
            Kelas::firstWhere('nama_kelas', request('kelas'));
        };

        return view('bk.page.daftar-siswa', [
            'siswas' => Student::latest('poin')->filter(request(['search', 'kelas']))->paginate(10000)->withQueryString(),
            'kelas' => Kelas::all()
        ]);
    }

    public function riwayat_siswa($id)
    {

        $siswa = Student::findOrFail($id);
        if (request('tanggal')) {
            $histories = History::with('siswa')->where('tanggal', request('tanggal'))->where('student_id', $id)->filter(request(['tanggal']))->paginate(7)->withQueryString();
            $tanggal = date('d-m-Y', strtotime(request('tanggal')));
        } else {
            $histories = History::latest()->with('siswa')->where('student_id', $id)->filter(request(['tanggal']))->paginate(7)->withQueryString();
            $tanggal = $histories->unique('tanggal')->pluck('tanggal');
        };
        return view('bk.page.histori.history', compact('histories', 'tanggal', 'siswa'));
    }

    // ubah password bk
    public function view_edit()
    {
        return view('bk.page.edit_pass');
    }

    // form ubah password bk
    public function edit_pass(Request $request, $id)
    {
        $message = [
            'max' => ':attribute maksimal :max karakter!',
            'min' => ':attribute minimal :min karakter!',
            'required' => ':attribute harus di isi!',
            'confirmed' => ':attribute tidak cocok!',
        ];
        $request->validate([
            'old_password' => 'required|min:8|max:255',
            'new_password' => 'required|confirmed|min:8|max:255',
        ], $message);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Password Lama tidak cocok!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password berhasil diubah!");
    }
}
