<!-- Modal Tambah User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <form action="/master-user/store" method="POST" id="addUserForm">
                @csrf
                <div class="modal-header" style="border-bottom: 1px solid #ccc; background-color: white; padding: 10px;">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 20px;">
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control" name="nisn" id="nisn" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Akses</label>
                        <select class="form-control" name="role" id="role" required>
                            <option value="" disabled selected>Pilih Akses</option>
                            <option value="1">BK</option>
                            <option value="2">Guru</option>
                            <option value="3">Siswa</option>
                            <option value="4">Osis</option>
                        </select>
                    </div>
                    <div>
                        <label for="info" class="form-label">Sudah Registrasi</label>
                        <div>
                            <input type="radio" id="info" name="info" value="1" checked>
                            <label for="info">Sudah</label>
                        </div>
                        <div>
                            <input type="radio" id="info2" name="info" value="0">
                            <label for="info2">Belum</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #ccc; padding: 10px;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
