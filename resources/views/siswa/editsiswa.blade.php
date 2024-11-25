{{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header fs-4 fw-bold" style="padding: 15px; background-color: #395886; color:white">
                <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="editsiswaform">
                    @csrf
                    <input type="hidden" name="student_id" id="student_id">
                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="name" id="name" required>
                        <label for="name">Nama</label>
                    </div>
                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="alamat" id="alamat" required>
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="no_telp" id="no_telp" required>
                        <label for="no_telp">Telepon</label>
                    </div>

                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="n_ayah" id="n_ayah" required>
                        <label for="n_ayah">Nama Ayah</label>
                    </div>
                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="n_ibu" id="n_ibu" required>
                        <label for="n_ibu">Nama Ibu</label>
                    </div>

                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="alamat_ortu" id="alamat_ortu" required>
                        <label for="alamat_ortu">Alamat Ortu</label>
                    </div>

                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="no_telp_rumah" id="no_telp_rumah" required>
                        <label for="no_telp_rumah">Nomer telepon rumah</label>
                    </div>
            </div>
            <div class="modal-footer" style="padding: 12px;">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-sm" style="background-color: #395886; color: white;" id="btn-update">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div> --}}

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="myModalLabel">Edit Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateSiswaForm" method="post" action="/updatesiswa/{{$siswa->id}}">
                    @csrf
                    @method('PUT') <!-- Untuk mendukung metode PUT -->
                    <input type="hidden" name="student_id" id="student_id" value="{{ $siswa->id }}">



                    <!-- Tambahkan input lainnya untuk alamat, no_telp, dll -->
                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="name" id="name" required>
                        <label for="name">Nama</label>
                    </div>
                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="alamat" id="alamat" required>
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="no_telp" id="no_telp" required>
                        <label for="no_telp">Telepon</label>
                    </div>

                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="n_ayah" id="n_ayah" required>
                        <label for="n_ayah">Nama Ayah</label>
                    </div>
                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="n_ibu" id="n_ibu" required>
                        <label for="n_ibu">Nama Ibu</label>
                    </div>

                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="alamat_ortu" id="alamat_ortu" required>
                        <label for="alamat_ortu">Alamat Ortu</label>
                    </div>

                    <div class="form-floating mb-4 mt-1">
                        <input type="text" class="form-control" name="no_telp_rumah" id="no_telp_rumah" required>
                        <label for="no_telp_rumah">Nomer telepon rumah</label>
                    </div>
                    <div class="modal-footer" style="padding: 12px;">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm" style="background-color: #395886; color: white;" id="btn-update">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .form-floating>.form-control {
        height: 3.2rem;
        line-height: 1.25;
    }

    label {
        top: -5px;
        height: auto;
    }

    label.error {
        padding: 0;
        top: 56px;
        right: 0px !important;
        height: auto;
        opacity: 1;
        color: #ff3b3b;
        font-size: 15px;
    }
</style>
