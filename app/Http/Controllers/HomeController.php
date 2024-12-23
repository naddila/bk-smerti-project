<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Osis;
use App\Models\Penanganan;
use App\Models\User;
use App\Models\Student;
use App\Models\WaliKelas;
use App\Models\Peraturan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'datasiswa']);
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // bk
        if (auth()->user()->role == 1) {
            $siswas = Student::all();
            $users = User::all();
            $walikelas = WaliKelas::all();
            $peraturan = Peraturan::all();
            $penanganan = Penanganan::latest()->take(3)->get();
            $histories = History::latest()->take(3)->get();
            return view('home', compact('siswas', 'users', 'walikelas', 'peraturan', 'penanganan', 'histories'));
        }

        // wali kelas
        if (auth()->user()->role == 2) {
            $wali_kelas_id = WaliKelas::firstWhere('user_id', auth()->user()->id);
            $siswas = Student::where('kelas_id', $wali_kelas_id->kelas_id)->get();
            $peraturan = Peraturan::all();
            $points = Peraturan::all();

            $sis = Student::whereHas('penanganan', function ($q) use ($wali_kelas_id) {
                $q->where('kelas_id', $wali_kelas_id->kelas_id);
            })->get();
            $id_student = [];
            foreach ($sis as $siswa) {
                $id_student[] = $siswa->id;
            }
            $penanganan = Penanganan::whereIn('student_id', $id_student)
                ->where('tindak_lanjut_id', '<', 2)->latest()->paginate(3);

            return view('home', compact('siswas', 'peraturan', 'points', 'penanganan', 'wali_kelas_id'));
        }

        // siswa
        if (auth()->user()->role == 3) {
            $siswas = Student::with('user')->take(10)->get()->sortByDesc('poin');
            $siswa = Student::firstWhere('nisn', auth()->user()->nisn);
            return view('home', compact('siswas', 'siswa'));
        }

        // pembina osis
        if (auth()->user()->role == 4) {
            $siswas = Student::all();
            $users = User::all();
            $walikelas = Walikelas::all();
            $peraturan = Peraturan::all();
            $penanganan = Penanganan::latest()->take(3)->get();
            $histories = History::latest()->take(10)->get();
            return view('home', compact('siswas', 'peraturan', 'penanganan', 'histories'));
        }
    }

}
