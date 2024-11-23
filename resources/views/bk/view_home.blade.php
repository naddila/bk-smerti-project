{{-- card pengguna --}}
<div class="cord col-lg-3 col-md-6">
    <div class="card" style="background-color: #ffffff; border: 1px solid #ddd; box-shadow: none;">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title" style="font-weight: bold; color: #333;">{{ 'PENGGUNA' }}</p>
                    <h2 class="card-text text-amount" style="color: #333;">
                        {{ $users->count() }}
                    </h2>
                </div>
                <div class="col-auto">
                    <div style="background-color: #f9f9f9; padding: 10px; border-radius: 50%; text-align: center;">
                        <i class="fas fa-users" aria-hidden="true" style="color: #333;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- card guru --}}
<div class="cord col-lg-3 col-md-6">
    <div class="card" style="background-color: #ffffff; border: 1px solid #ddd; box-shadow: none;">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title" style="font-weight: bold; color: #333;">{{ 'GURU' }}</p>
                    <h2 class="card-text text-amount" style="color: #333;">
                        @if ($walikelas->count())
                            {{ $walikelas->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div style="background-color: #f9f9f9; padding: 10px; border-radius: 50%; text-align: center;">
                        <i class="fas fa-user-tie" aria-hidden="true" style="color: #333;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- card siswa --}}
<div class="cord col-lg-3 col-md-6">
    <div class="card" style="background-color: #ffffff; border: 1px solid #ddd; box-shadow: none;">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title" style="font-weight: bold; color: #333;">{{ 'SISWA' }}</p>
                    <h2 class="card-text text-amount" style="color: #333;">
                        @if ($siswas->count())
                            {{ $siswas->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div style="background-color: #f9f9f9; padding: 10px; border-radius: 50%; text-align: center;">
                        <i class="fas fa-user-graduate" aria-hidden="true" style="color: #333;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- card penanganan --}}
<div class="cord col-lg-3 col-md-6">
    <div class="card" style="background-color: #ffffff; border: 1px solid #ddd; box-shadow: none;">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title" style="font-weight: bold; color: #333;">{{ 'PERATURAN' }}</p>
                    <h2 class="card-text text-amount" style="color: #333;">
                        @if ($peraturan->count())
                            {{ $peraturan->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div style="background-color: #f9f9f9; padding: 10px; border-radius: 50%; text-align: center;">
                        <i class="fa fa-clipboard" aria-hidden="true" style="color: #333;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- card selamat datang --}}
<div class="card col-lg-12 rounded-3" style="background-color: #ffffff; border: 1px solid #ddd; box-shadow: none;">
    <div class="card-body py-4 px-5">
        <h1 class="text-center fw-bold mb-3" style="color: #333;">Selamat Datang, Guru BK</h1>
        <p class="text-center" style="color: #666; font-size: 1.1rem; margin: 0;">
            Mari bersama-sama membangun generasi yang lebih baik <br>dengan memberikan konseling dan penanganan terhadap
            pelanggaran siswa!
        </p>
    </div>
</div>


{{-- card pelanggaran --}}
<div class="cord col-lg-12 col-md-12 mt-4" style="padding: 0; margin: 0 auto;">
    <div class="card" style="background-color: #ffffff; border: 1px solid #ddd; box-shadow: none;">
        <div class="card-body">
            <h5 class="card-title fw-bold" style="color: #333; margin-bottom: 1rem;">Histori Pelanggaran Terbaru</h5>
            <ul class="list-group list-group-flush">
                @forelse ($histories as $histories)
                    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #ffffff;">
                        <div>
                            <strong>{{ $histories->siswa->nama }}</strong> - {{ $histories->siswa->kelas->nama_kelas }}
                            <p class="mb-0 text-muted" style="font-size: 0.9rem;">{{ $histories->rule->nama }}</p>
                        </div>
                        <span class="badge bg-danger">{{ $histories->rule->poin }} Poin</span>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted" style="background-color: #ffffff;">Tidak ada pelanggaran terbaru</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>


