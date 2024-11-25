<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\WaliKelas;
use App\Models\Penanganan;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PenangananController extends Controller
{
    // menampilkan data penanganan untuk BK
    public function index()
    {
        $penanganan = Penanganan::with(['siswa', 'pesan'])->latest()->paginate(10000);
        return view('bk.page.penanganan', compact('penanganan'));
    }

    // logika penanganan oleh BK
    public function konfirmasi(Request $request, $id)
    {
        $penanganan = Penanganan::findOrFail($id);
        if ($penanganan->pesan->tingkatan != 'Ringan') {
            // Final Konfirmasi
            if ($penanganan->status == 1) {
                $penanganan->update([
                    'status' => 2
                ]);
                return redirect()->back()->with('success', 'Terkonfirmasi');
            }

            // Atur Hari Indonesia
            $tgl = $request->input('date');
            $tampil_hari = true;
            $nama_hari  = array(
                'Minggu',
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jum\'at',
                'Sabtu'
            );
            $nama_bulan = array(
                1 =>
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );

            $tahun   = substr($tgl, 0, 4);
            $bulan   = $nama_bulan[(int) substr($tgl, 5, 2)];
            $tanggal = substr($tgl, 8, 2);
            $text    = '';

            if ($tampil_hari) {
                $urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
                $hari        = $nama_hari[$urutan_hari];
                $text       .= "$tanggal $bulan $tahun";
            } else {
                $text       .= "$tanggal $bulan $tahun";
            }
            $jam = $request->input('time');

            $pdf = PDF::loadView('surat-panggilan', compact('jam', 'penanganan', 'hari', 'text'))->setOptions([
                'chroot' => '/public',
                'defaultFont' => 'helvetica'
            ]);

            $tindak_lanjut = str_replace(' ', '_', $penanganan->pesan->tindak_lanjut);
            $id_student = strtok($penanganan->siswa->id, " ");
            $fileName = Str::slug($tindak_lanjut)  . '_' . $id . '.' . 'pdf';
            $content = $pdf->download($fileName)->getOriginalContent();
            Storage::put('public/surat/' . $fileName, $content);


            $penanganan->update([
                'status' => 1,
                'berkas' => $fileName,
            ]);

            return redirect()->back()->with('success', 'Terkirim');
        }

        $penanganan->update([
            'status' => 1
        ]);
        return redirect()->back()->with('success', 'Selesai');
    }

    // menampilkan data penanganan untuk guru
    public function guru_index()
    {
        $wali_kelas = WaliKelas::where('user_id', auth()->user()->id)->first();
        $siswas = Student::where('kelas_id', $wali_kelas->kelas_id)->first();

        $siswa = Student::whereHas('penanganan', function ($q) use ($wali_kelas) {
            $q->where('kelas_id', $wali_kelas->kelas_id);
        })->get();
        $id_student = [];
        foreach ($siswa as $item) {
            $id_student[] = $item->id;
        }
        $penanganan = Penanganan::whereIn('student_id', $id_student)
            ->where('tindak_lanjut_id', '<', 2)->latest()->paginate(null);
        return view('guru.page.penanganan', compact('penanganan', 'siswas', 'wali_kelas'));
    }

    // konfirmasi penanganan oleh guru
    public function guru_konfirmasi($id)
    {
        $penanganan = Penanganan::findOrFail($id);
        $penanganan->update([
            'status' => 1
        ]);
        return redirect()->back()->with('success', 'Terkonfirmasi');
    }

    public function destroy($id)
    {
        // Cari penanganan berdasarkan ID
        $penanganan = Penanganan::findOrFail($id);

        // Hapus penanganan
        $penanganan->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('/penanganan')->with('success', 'Penanganan berhasil dihapus');
    }
}
