<div class="container my-3">
    <div class="row gap-3">
        <!-- Card Selamat Datang -->
        <div class="col-lg-6 col-md-12 mb-3 p-0">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="card-title text-title text-dark">Selamat Datang, {{ strtok(auth()->user()->name, ' ') }}</p>
                            <p class="text-muted mb-0">Semoga hari mu menyenangkan, jangan melanggar aturan ya hari ini!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- card penanganan --}}
        <div class="cord col-lg-3 col-md-6">
            <div class="card bg-white">
                <div class="card-body border-left-blue">
                    <div class="row">
                        <div class="col">
                            <p class="card-title text-title text-dark">{{ 'Poin Pelanggaran' }}</p>
                            <h2 class="card-text text-amount text-dark">{{ $siswa->poin }}</h2>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape blue icon-pie">
                                <i class="fa fa-clipboard text-dark" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Tabel Data Siswa -->
        <div class="card bg-white">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-4" style="color: #395886;">Data Siswa dan Orang Tua</h5>
                <table class="table table-bordered table-striped">
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
                <!-- Tombol Edit -->
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-sm text-white" style="background-color: #395886;" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        <i class="fas fa-pen me-2"></i>Edit Data Siswa
                    </button>
                </div>
            </div>
        </div>
    </div>
