<?php

namespace App\Http\Controllers;

use App\Models\Osis;
use App\Models\Kelas;
use App\Models\History;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Peraturan;
use App\Models\Penanganan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OsisController extends Controller
{
    // daftar siswa
    public function daftar_siswa()
    {
        if (request('kelas')) {
            Kelas::firstWhere('nama_kelas', request('kelas'));
        };

        return view('osis.daftar-siswa', [
            'siswas' => Student::latest('poin')->filter(request(['search', 'kelas']))->paginate(10000)->withQueryString(),
            'kelas' => Kelas::all()
        ]);
    }

    public $message = [
        'max' => ':attribute maksimal :max Karakter!',
        'min' => ':attribute minimal :min Karakter!',
        'image' => ':attribute harus berupa Foto!',
        'unique' => ':attribute sudah digunakan!',
        'required' => ':attribute harus di isi!',
        'numeric' => ':attribute harus berisi angka!',
        'digits' => ':attribute harus berisi 10 digit'
    ];

    // tamnpilan tambah poin
    public function osis_tambah_view(Student $siswa)
    {
        return view('osis.poin.tambah', [
            'siswa' => $siswa,
            'rules' => Peraturan::oldest()->filter(request('search'))->get()
        ]);
    }

    // logika osis tambah poin
    public function osis_tambah_poin(Request $request, $id)
    {
        $siswa = Student::findOrFail($id);
        $penanganan = Penanganan::where('student_id', '=', $siswa->id)->get();

        if ($request->total == 0 || $request->total == '') {
            return redirect()->back()->with('error', 'Poin tidak valid!');
        }

        // Poin sebelum penambahan
        $poin_sebelumnya = $siswa->poin;

        // Menyimpan riwayat pelanggaran
        $histories = $request->input('rule');
        foreach ($histories as $history) {
            History::create([
                'student_id' => $siswa->id,
                'peraturan_id' => $history,
                'tanggal' => date('Y-m-d', time())
            ]);
        }

        // Menambah poin ke total poin siswa
        $siswa->update([
            'poin' => $siswa->poin + $request->total
        ]);

        // Poin setelah penambahan
        $poin_terbaru = $siswa->poin;

        // Menangani penanganan berdasarkan poin terbaru
        if ($poin_terbaru >= 0 && $poin_terbaru <= 20 && $poin_sebelumnya < 20) {
            // Peringatan
            Penanganan::create([
                'student_id' => $siswa->id,
                'tindak_lanjut_id' => 1
            ]);
        }

        if ($poin_terbaru >= 25 && $poin_terbaru <= 40 && $poin_sebelumnya < 25) {
            // Surat Panggilan 1
            Penanganan::create([
                'student_id' => $siswa->id,
                'tindak_lanjut_id' => 2
            ]);
        }

        if ($poin_terbaru >= 45 && $poin_terbaru <= 60 && $poin_sebelumnya < 45) {
            // Surat Panggilan 2
            Penanganan::create([
                'student_id' => $siswa->id,
                'tindak_lanjut_id' => 3
            ]);
        }

        if ($poin_terbaru >= 65 && $poin_terbaru <= 80 && $poin_sebelumnya < 65) {
            // Surat Panggilan 3
            Penanganan::create([
                'student_id' => $siswa->id,
                'tindak_lanjut_id' => 4
            ]);
        }

        if ($poin_terbaru >= 85 && $poin_terbaru <= 100 && $poin_sebelumnya < 85) {
            // Dikembalikan ke orang tua
            Penanganan::create([
                'student_id' => $siswa->id,
                'tindak_lanjut_id' => 5
            ]);
        }
        // route daftar siswa
        return redirect('/osis/daftar-siswa')->with('success', 'Poin berhasil ditambahkan');
    }


    // master histori (menampilkan halaman histori siswa)
    public function osis_histori_index()
    {
        if (request('tanggal')) {
            $histories = History::with('siswa')->where('tanggal', request('tanggal'))->filter(request(['tanggal']))->paginate(7)->withQueryString();
            $tanggal = date('d-m-Y', strtotime(request('tanggal')));
        } else {
            $histories = History::latest()->with('siswa')->filter(request(['tanggal']))->paginate(7)->withQueryString();
            $tanggal = $histories->unique('tanggal')->pluck('tanggal');
        };

        return view('osis.history.master_history', compact('histories', 'tanggal'));
    }

    // untuk menampilkan histori berdasarkan tanggal
    public function osis_histori_admin($id)
    {
        $siswa = Student::findOrFail($id);
        if (request('tanggal')) {
            $histories = History::with('siswa')->where('tanggal', request('tanggal'))->where('student_id', $id)->filter(request(['tanggal']))->paginate(7)->withQueryString();
            $tanggal = date('d-m-Y', strtotime(request('tanggal')));
        } else {
            $histories = History::latest()->with('siswa')->where('student_id', $id)->filter(request(['tanggal']))->paginate(7)->withQueryString();
            $tanggal = $histories->unique('tanggal')->pluck('tanggal');
        };
        return view('osis.history.history', compact('histories', 'tanggal', 'siswa'));
    }

    // ubah password osis
    public function view_edit()
    {
        return view('osis.update_pass');
    }

    // form ubah password osis
    public function ubah_pass(Request $request, $id)
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
