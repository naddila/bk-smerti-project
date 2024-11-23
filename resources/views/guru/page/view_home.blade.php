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

{{-- card penanganan --}}
<div class="cord col-lg-3 col-md-6">
    <div class="card bg-white">
        <div class="card-body border-left-green">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title text-dark">{{ 'Penanganan' }}</p>
                    <h2 class="card-text text-amount text-dark">
                        @if ($penanganan->count())
                            {{ $penanganan->count() }}
                        @else
                            0
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="icon-shape green icon-area">
                        <i class="fas fa-gavel text-dark" aria-hidden="true"></i>
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
            <h1 class="fw-bold">Selamat Datang, {{ strtok(auth()->user()->name, ' ') }}</h1>
            <p class="text-muted">Mari bersama-sama membangun generasi yang lebih baik <br>dengan memberikan konseling
                dan penanganan terhadap
                pelanggaran siswa!</p>
        </div>
    </div>
</div>
