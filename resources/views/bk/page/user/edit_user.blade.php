<div class="modal fade" id="myModal" tabindex="-1" role="dialog"  data-bs-keyboard="false"
aria-hidden="true">
<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header fs-4 fw-bold" style="padding: 15px; background-color: #395886;">
            <h4 class="modal-title" id="myModalLabel" style="color: white;">Edit Pengguna</h4>
        </div>

        <div class="modal-body">
            <form action="" method="post" id="editform">
                @csrf
                <div class="form-floating mb-4">
                    <input minlength=8 type="text" class="form-control" name="nisn" id="nisn" required
                    autofocus>
                    <label for="nisn">NISN</label>
                </div>
                <div class="form-floating mb-4 mt-1">

                    <input type="text" class="form-control" name="name" id="name" required>
                    <label for="name">Nama</label>
                </div>
                <div class="form-floating mb-4 mt-1">
                    <input type="text" class="form-control" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mb-2 mt-1">
                    <select class="form-select" id="role" name="role" required>
                        <option selected value="" disabled>Pilih Role</option>
                        <option value="1">BK</option>
                        <option value="2">Guru</option>
                        <option value="3">Siswa</option>
                        <option value="4">Osis</option>
                    </select>
                    <label for="role">Role</label>
                </div>

                <div class="d-flex mx-4 ps-1">
                    <div class="form-check ps-0 mb-0 me-4">
                        <input class="form-check-input" type="radio" name="info" id="info" value="1">
                        <label class="form-check-label info" for="info" style="margin: 2px 0 0 -4px;">
                            Terdaftar
                        </label>
                    </div>
                    <div class="form-check ps-0 mb-0 ms-4">
                        <input class="form-check-input" type="radio" name="info" id="info2" value="0">
                        <label class="form-check-label info2" for="info2" style="margin: 2px 0 0 -4px;">
                            Belum Terdaftar
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 12px;">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-sm btn-warning" id="btn-update"
                onclick="editUser(event)">Edit</button>
            </div>
        </form>
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
        color: #395886;
        font-size: 15px;
    }
</style>
