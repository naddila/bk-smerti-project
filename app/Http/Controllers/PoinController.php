<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Penanganan;
use App\Models\Peraturan;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert;

class PoinController extends Controller
{
    public $message = [
        'max' => ':attribute maksimal :max Karakter!',
        'min' => ':attribute minimal :min Karakter!',
        'image' => ':attribute harus berupa Foto!',
        'unique' => ':attribute sudah digunakan!',
        'required' => ':attribute harus di isi!',
        'numeric' => ':attribute harus berisi angka!',
        'digits' => ':attribute harus berisi 10 digit'
    ];

    public function tambah_view(Student $siswa)
    {
        return view('bk.page.poin.tambah-poin', [
            'siswa' => $siswa,
            'rules' => Peraturan::oldest()->filter(request('search'))->get()
        ]);
    }

    // public function tambah_poin(Request $request, $id)
    // {
    //     $siswa = Student::findOrFail($id);
    //     $penanganan = Penanganan::where('student_id', '=', $siswa->id)->get();

    //     if ($request->total == 0 || $request->total == '') {
    //         return redirect()->back()->with('error', 'Poin tidak valid!');
    //     }

    //     $tindak_lanjut = [];
    //     foreach ($penanganan as $item) {
    //         $tindak_lanjut[] = $item->pesan->tindak_lanjut;
    //     }

    //     $histories = $request->input('rule');

    //     foreach ($histories as $history) {

    //         History::create([
    //             'student_id' => $siswa->id,
    //             'peraturan_id' => $history,
    //             'tanggal' => date('Y-m-d', time())
    //         ]);
    //     }

    //     $siswa->update([
    //         'poin' => $siswa->poin + $request->total
    //     ]);


    //     if ($siswa->poin >= 0 && $siswa->poin <= 20 && !(in_array('Peringatan ke I', $tindak_lanjut))) {
    //         Penanganan::create([
    //             'student_id' => $siswa->id,
    //             'tindak_lanjut_id' => 1
    //         ]);
    //     }

    //     if ($siswa->poin >= 25 && $siswa->poin <= 40 && !(in_array('Panggilan Orang tua I', $tindak_lanjut))) {
    //         Penanganan::create([
    //             'student_id' => $siswa->id,
    //             'tindak_lanjut_id' => 2
    //         ]);
    //     }
    //     if ($siswa->poin >= 45 && $siswa->poin <= 60 && !(in_array('Panggilan Orang tua II', $tindak_lanjut))) {
    //         Penanganan::create([
    //             'student_id' => $siswa->id,
    //             'tindak_lanjut_id' => 3
    //         ]);
    //     }
    //     if ($siswa->poin >= 65 && $siswa->poin <= 95 && !(in_array('Panggilan Orang tua III', $tindak_lanjut))) {
    //         Penanganan::create([
    //             'student_id' => $siswa->id,
    //             'tindak_lanjut_id' => 4
    //         ]);
    //     }

    //     if ($siswa->poin >= 100 && !(in_array('Dikembalikan Orang tua', $tindak_lanjut))) {
    //         Penanganan::create([
    //             'student_id' => $siswa->id,
    //             'tindak_lanjut_id' => 5
    //         ]);
    //     }
    //     // route master-siswa
    //     return redirect('/master-siswa')->with('success', 'Poin berhasil ditambahkan');
    // }

    public function tambah_poin(Request $request, $id)
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
            // Surat Panggilan
            Penanganan::create([
                'student_id' => $siswa->id,
                'tindak_lanjut_id' => 4
            ]);
        }

        if ($poin_terbaru >= 85 && $poin_terbaru <= 100 && $poin_sebelumnya < 85){
            // Dikembalikan kepada orang tua
            Penanganan::create([
                'student_id' => $siswa->id,
                'tindak_lanjut_id' => 5
            ]);
        }

        // Redirect setelah poin berhasil ditambahkan
        return redirect('/master-siswa')->with('success', 'Poin berhasil ditambahkan');
    }

    public function kurang_view(Student $siswa)
    {
        return view('bk.page.poin.kurang-poin', [
            'siswa' => $siswa,
            'rules' => Peraturan::all()
        ]);
    }

    public function kurang_poin(Request $request, $id)
    {
        $this->validate($request, [
            'poin' => 'required'
        ], $this->message);

        $siswa = Student::findOrFail($id);

        if ($siswa->poin < $request->poin) {
            return redirect()->back()->with('toast_error', 'Poin tidak valid!');
        } else {

            $siswa->update([
                'poin' => $siswa->poin - $request->poin
            ]);

            return redirect('master-siswa')->with('success', 'Poin berhasil dikurangi');
        }
    }
}
