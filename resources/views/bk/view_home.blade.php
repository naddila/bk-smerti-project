{{-- card pengguna --}}
<div class="cord col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body border-left-yellow">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title">{{ 'PENGGUNA' }}</p>
                    <h2 class="card-text text-amount">
                        {{ $users->count() }}
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape yellow icon-area">
                        <i class="fas fa-users" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- card guru --}}
<div class="cord col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body border-left-orange">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title">{{ 'GURU' }}</p>
                    <h2 class="card-text text-amount">
                        @if ($walikelas->count())
                            {{ $walikelas->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape orange icon-area">
                        <i class="fas fa-user-tie" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- card siswa --}}
<div class="cord col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body border-left-green">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title">{{ 'SISWA' }}</p>
                    <h2 class="card-text text-amount">
                        @if ($siswas->count())
                            {{ $siswas->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape green icon-area">
                        <i class="fas fa-user-graduate" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- card penanganan --}}
<div class="cord col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body border-left-blue">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title">{{ 'PERATURAN' }}</p>
                    <h2 class="card-text text-amount">
                        @if ($peraturan->count())
                            {{ $peraturan->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape blue icon-pie">
                        <i class="fa fa-clipboard" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- card selamat datang --}}
<div class="card col-lg-12 rounded-3" style="background-color: #f0f4fa; padding: 0;">
    <div class="card-body py-4 px-5" style="max-width: auto;">
        <h1 class="text-center fw-bold mb-3" style="color: #395886;">Selamat Datang, Guru BK</h1>
        <p class="text-center" style="color: #6c757d; font-size: 1.1rem;">
            Mari bersama-sama membangun generasi yang lebih baik <br>dengan memberikan konseling dan penanganan terhadap
            pelanggaran siswa!
        </p>
    </div>
</div>

{{-- card pelanggaran --}}
<div class="cord col-lg-12 col-md-12 mt-4" style="padding:0; margin:0 auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title fw-bold" style="color:#395886">Histori Pelanggaran Terbaru</h5>
            <ul class="list-group list-group-flush">
                @forelse ($histories as $histories)
                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: rgb(245, 251, 253)">
                        <div>
                            <strong>{{ $histories->siswa->nama }}</strong> - {{ $histories->siswa->kelas->nama_kelas }}
                            <p class="mb-0 text-muted">{{ $histories->rule->nama }}</p>
                        </div>
                        <span class="badge bg-danger">{{ $histories->rule->poin }} Poin</span>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted">Tidak ada pelanggaran terbaru</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>

