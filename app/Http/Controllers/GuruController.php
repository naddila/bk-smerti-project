<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use App\Models\Student;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    // menampilkan daftar siswa berdasarkan kelas
    public function daftar_siswa()
    {
        $wali_kelas = WaliKelas::firstWhere('user_id', auth()->user()->id);
        $siswas = Student::where('kelas_id', $wali_kelas->kelas_id)->paginate(null)->withQueryString();
        return view('guru.page.daftar-siswa', compact('siswas', 'wali_kelas'));
    }

    // menampilkan riwayat siswa
    public function history_siswa($id)
    {
        $wali_kelas = WaliKelas::firstWhere('user_id', auth()->user()->id);
        $siswas = Student::firstWhere('kelas_id', $wali_kelas->kelas_id);

        if (request('tanggal')) {
            $histories = History::with('siswa')->where('tanggal', request('tanggal'))->where('student_id', $id)->filter(request(['tanggal']))->paginate(7)->withQueryString();
            $tanggal = date('d-m-Y', strtotime(request('tanggal')));
        } else {
            $histories = History::latest()->with('siswa')->where('student_id', $id)->filter(request(['tanggal']))->paginate(7)->withQueryString();
            $tanggal = $histories->unique('tanggal')->pluck('tanggal');
        };

        return view('guru.page.history', compact('histories', 'tanggal', 'siswas'));
    }

    // ubah password guru
    public function view_ubah()
    {
        return view('guru.page.ubah_pass');
    }

    // form ubah password guru
    public function update_pass(Request $request, $id)
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
