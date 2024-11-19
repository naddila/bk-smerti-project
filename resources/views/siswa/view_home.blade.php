<div class="row gap-3">
    <!-- Card Selamat Datang -->
    <div class="col-lg-6 col-md-12 mb-3 p-0">
        <div class="card h-100" style="animation-delay: 0s;">
            <div class="card-body border-left-blue">
                <div class="row">
                    <div class="col">
                        <p class="card-title text-title text-bold" style="color: #395886">Selamat Datang, {{ strtok(auth()->user()->name, ' ') }}</p>
                        <p class="card-text text-muted">Semoga hari mu menyenangkan, jangan melanggar aturan ya hari ini!</p>
                    </div>
                    <div class="col-auto">
                        <div class="icon-shape blue icon-area">
                            <i class="fas fa-smile" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Poin Pelanggaran -->
    <div class="col-lg-4 col-md-12 mb-3 p-0">
        <div class="card h-100" style="animation-delay: 0s;">
            <div class="card-body border-left-green">
                <div class="row">
                    <div class="col">
                        <p class="card-title text-title">{{ 'POIN PELANGGARAN' }}</p>
                        <h2 class="card-text text-amount">
                            {{ $siswa->poin }}
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
</div>

{{-- <div class="row px-0">
    <div class="cut col-lg-6 pr-2">
        <div class="card shadow-lg-3">
            <div class="card-header text-light h5 px-3" style="background-color: #395886;">
                <i class="fas fa-user-graduate mr-2"></i>
                Data Siswa
                <div class="float-end">
                    <button class="btn clickind btn-sm btn-detail open_modal" style="background-color: white"
                style="animation-delay: 1s;"><i class="fas fa-pen"></i></button>
                </div>
            </div>
            <div class="card-body py-1 px-3 text-dark">
                <table class="table mb-0">
                    <tr class="table-tr">
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $siswa->nama }}</td>
                    </tr>
                    <tr class="table-tr">
                        <td>NISN</td>
                        <td>:</td>
                        <td>{{ $siswa->nisn }}</td>
                    </tr>
                    <tr class="table-tr">
                        <td>TTL</td>
                        <td>:</td>
                        <td>{{ $siswa->ttl }}</td>
                    </tr>
                    <tr class="table-tr">
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ $siswa->jk }}</td>
                    </tr>
                    <tr class="table-tr">
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ $siswa->agama }}</td>
                    </tr>
                    <tr class="table-tr">
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $siswa->alamat }}</td>
                    </tr>
                    <tr class="table-tr">
                        <td>Telepon Siswa</td>
                        <td>:</td>
                        <td>{{ $siswa->no_telp }}</td>
                    </tr>
                    <tr class="table-trr">
                        <td>Nama Ayah</td>
                        <td>:</td>
                        <td>{{ $siswa->n_ayah }}</td>
                    </tr>
                    <tr class="table-trr">
                        <td>Nama Ibu</td>
                        <td>:</td>
                        <td>{{ $siswa->n_ibu }}</td>
                    </tr>
                    <tr class="table-trr">
                        <td>Alamat Ortu</td>
                        <td>:</td>
                        <td>{{ $siswa->alamat_ortu }}</td>
                    </tr>
                    <tr class="table-trr">
                        <td>Telepon Rumah</td>
                        <td>:</td>
                        <td>{{ $siswa->no_telp_rumah }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div> --}}
<div class="row px-0">
    <div class="col-lg-10 col-md-6 mb-3 p-0">
        <div class="card shadow-lg rounded border-0">
            <div class="card-header d-flex justify-content-between align-items-center text-light h5 px-3"
                style="background-color: #395886;">
                <div>
                    <i class="fas fa-user-graduate me-2"></i> Data Siswa dan Orang Tua
                </div>
                <button class="btn btn-sm btn-outline-light open_modal clickind">
                    <i class="fas fa-pen"></i>
                </button>
            </div>
            <div class="card-body text-dark">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Informasi</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>{{ $siswa->nama }}</td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>{{ $siswa->nisn }}</td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>{{ $siswa->ttl }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{ $siswa->jk }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>{{ $siswa->agama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $siswa->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Telepon Siswa</td>
                            <td>{{ $siswa->no_telp }}</td>
                        </tr>
                        <tr>
                            <td>Nama Ayah</td>
                            <td>{{ $siswa->n_ayah }}</td>
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td>{{ $siswa->n_ibu }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Ortu</td>
                            <td>{{ $siswa->alamat_ortu }}</td>
                        </tr>
                        <tr>
                            <td>Telepon Rumah</td>
                            <td>{{ $siswa->no_telp_rumah }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


