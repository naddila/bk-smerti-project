<!-- Card Pengguna -->
<div class="cord col-lg-3 col-md-6">
    <div class="card bg-white">
        <div class="card-body border-left-green">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title text-dark">{{ 'Pengguna' }}</p>
                    <h2 class="card-text text-amount text-dark">
                        @if ($users->count())
                            {{ $users->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape green icon-area">
                        <i class="fas fa-user-graduate text-dark" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card Guru -->
<div class="cord col-lg-3 col-md-6">
    <div class="card bg-white">
        <div class="card-body border-left-green">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title text-dark">{{ 'Wali Kelas' }}</p>
                    <h2 class="card-text text-amount text-dark">
                        @if ($walikelas->count())
                            {{ $walikelas->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape green icon-area">
                        <i class="fas fa-user-graduate text-dark" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card Siswa -->
<div class="cord col-lg-3 col-md-6">
    <div class="card bg-white">
        <div class="card-body border-left-green">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title text-dark">{{ 'Siswa' }}</p>
                    <h2 class="card-text text-amount text-dark">
                        @if ($siswas->count())
                            {{ $siswas->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape green icon-area">
                        <i class="fas fa-user-graduate text-dark" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card Peraturan -->
{{-- card siswa --}}
<div class="cord col-lg-3 col-md-6">
    <div class="card bg-white">
        <div class="card-body border-left-green">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title text-dark">{{ 'Peraturan' }}</p>
                    <h2 class="card-text text-amount text-dark">
                        @if ($peraturan->count())
                            {{ $peraturan->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape green icon-area">
                        <i class="fas fa-user-graduate text-dark" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card Selamat Datang -->
<div class="col-lg-12 mb-4">
    <div class="card shadow-sm bg-white">
        <div class="card-body text-center">
            <h1 class="fw-bold">Selamat Datang, Guru BK</h1>
            <p class="text-muted">Mari bersama-sama membangun generasi yang lebih baik dengan memberikan konseling dan penanganan terhadap pelanggaran siswa!</p>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card shadow-sm bg-white">
        <div class="card-body">
            <h5 class="fw-bold">Pelanggaran Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                        @forelse ($histories as $history)
                            <tr>
                                <td>{{ $history->siswa->nama }}</td>
                                <td>{{ $history->siswa->kelas->nama_kelas }}</td>
                                <td>{{ $history->rule->nama }}</td>
                                <td class="text-center">
                                    <span class="badge bg-danger">{{ $history->rule->poin }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Tidak ada pelanggaran terbaru</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
