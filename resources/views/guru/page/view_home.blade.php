{{-- card jumlah siswa --}}
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

{{-- card penanganan --}}
<div class="cord col-lg-4 col-md-6">
    <div class="card" style="animation-delay: .5s;">
        <div class="card-body border-left-blue">
            <div class="row">
                <div class="col">
                    <p class="card-title text-title">{{ 'PENANGANAN' }}</p>
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

{{-- card selamat datang --}}
<div class="card col-lg-12 rounded-3" style="background-color: #f0f4fa; padding: 0;">
    <div class="card-body py-4 px-5" style="max-width: auto;">
        <h1 class="text-center fw-bold mb-3" style="color: #395886;">Selamat Datang, {{ strtok(auth()->user()->name, ' ') }}</h1>
        <p class="text-center" style="color: #6c757d; font-size: 1.1rem;">
            Mari bersama-sama membangun generasi yang lebih baik <br>dengan memberikan konseling dan penanganan terhadap
            pelanggaran siswa!
        </p>
    </div>
</div>


