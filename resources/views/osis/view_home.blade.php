<div class="cord col-lg-4 col-md-6 ps-0">
    <div class="card" style="animation-delay: .0s;">
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
<div class="cord col-lg-4 col-md-6">
    <div class="card" style="animation-delay: .5s;">
        <div class="card-body border-left-blue">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title">{{ 'PELANGGARAN' }}</p>
                    <h2 class="card-text text-amount">
                        @if ($penanganan->count())
                            {{ $penanganan->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape blue icon-pie">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cord col-lg-4 col-md-6">
    <div class="card" style="animation-delay: .5s;">
        <div class="card-body border-left-blue">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title">{{ 'HISTORI' }}</p>
                    <h2 class="card-text text-amount">
                        @if ($histories->count())
                            {{ $histories->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape blue icon-pie">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- card selamat datang --}}
<div class="card col-lg-12 rounded-3" style="background-color: #f0f4fa; padding: 0;">
    <div class="card-body py-4 px-5" style="max-width: auto;">
        <h1 class="text-center fw-bold mb-3" style="color: #395886;">Selamat Datang, Pembina Osis</h1>
        <p class="text-center" style="color: #6c757d; font-size: 1.1rem;">
            Mari bersama-sama membangun generasi yang lebih baik <br>dengan mencatat pelanggaran siswa untuk memonitoring perilaku siswa!
        </p>
    </div>
</div>

{{-- card pelanggaran --}}
<div class="cord col-lg-12 col-md-12 mt-4" style="padding:0; margin:0 auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title fw-bold" style="color:#395886">Histori Pelanggaran Terbaru</h5>
            <ul class="list-group list-group-flush">
                @forelse ($histories as $history)
                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: rgb(245, 251, 253)">
                        <div>
                            <strong>{{ $history->siswa->nama }}</strong> - {{ $history->siswa->kelas->nama_kelas }}
                            <p class="mb-0 text-muted">{{ $history->rule->nama }}</p>
                        </div>
                        <span class="badge bg-danger">{{ $history->rule->poin }} Poin</span>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted">Tidak ada pelanggaran terbaru</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>


