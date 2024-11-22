@extends('layouts.main')

@section('title', 'Daftar Pengguna')

@push('css')
    <style>
        #change_pass_form label.error {
            opacity: 1;
            color: #395886;
            font-size: 13px;
        }
    </style>
@endpush

@section('content')
    <div class="card shadow px-0">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #395886;">
            <h3 class="fw-bolder mt-2 d-inline-flex text-white">Daftar Pengguna</h3>
            <button type="button" class="btn btn-md btn-light text-primary float-end" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fas fa-user-plus me-1"></i> Tambah
            </button>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table id="table_data_user" class="table table-bordered display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Registrasi</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="{{ $user->info == 1 ? 'text-success' : 'text-danger' }}">
                                {{ $user->info == 1 ? 'Sudah' : 'Belum' }}
                            </td>
                            <td style="font-weight:600; color: {{ $user->role == 1 ? '#395886' : ($user->role == 2 ? '#628ecb' : '#628ecb') }}">
                                {{ $user->role == 1 ? 'BK' : ($user->role == 2 ? 'Guru' : ($user->role == 3 ? 'Siswa' : 'Osis')) }}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning btn-detail open_modal" value="{{ $user->id }}">
                                    <i class="fas fa-pen"></i> Edit
                                </button>
                                <button type="button" onclick="deleteUser({{ $user->id }})" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('bk.page.user.edit_user')
    @include('bk.page.user.create_user')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#table_data_user').DataTable({
                pagingType: 'simple_numbers',
                responsive: true,
                processing: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json",
                    paginate: {
                        first: '«',
                        previous: '‹',
                        next: '›',
                        last: '»'
                    }
                },
                'columnDefs': [
                    { orderable: false, responsivePriority: 1, targets: 1 },
                    { orderable: false, targets: 2 },
                    { orderable: false, responsivePriority: 2, targets: 5 }
                ],
            });
        });

        // Form edit user
        $(document).on('click', '.open_modal', function() {
            var user_id = $(this).val();
            $.get("/master-user/" + user_id + "/edit", function(data) {
                const target = "{{ url('master-user/:id') }}".replace(':id', data.id);
                const pass = "{{ url('change-pass/:id') }}".replace(':id', data.id);
                $('input#user_id').val(data.id);
                $('input#nisn').val(data.nisn);
                $('input#name').val(data.name);
                $('input#email').val(data.email);
                $('select#role').val(data.role).change();
                $('input#info').prop('checked', data.info == 1);
                $('input#info2').prop('checked', data.info == 0);
                $('#editform').attr('action', target);
                $('#change_pass_form').attr('action', pass);
                $('#myModal').modal('show');
            });
        });

        // Edit user
        function editUser(event) {
            var url = $('form#editform').attr('action');
            $('form#editform').validate({
                rules: {
                    nisn: { number: true, required: true, minlength: 8, maxlength: 10 },
                    name: { required: true, maxlength: 255 },
                    email: { required: true, maxlength: 255, email: true },
                    role: { required: true }
                },
                messages: {
                    nisn: { number: "* Nisn harus berupa angka!", required: "* Nisn harus diisi!" },
                    name: { required: "* Nama harus diisi!" },
                    email: { required: "* Email harus diisi!", email: "* Masukkan Email yang valid" }
                },
                submitHandler: function(form) {
                    $("#btn-update").attr("disabled", true);
                    $.ajax({
                        url: url,
                        type: "PUT",
                        data: {
                            _token: $('meta[name=csrf-token]').attr("content"),
                            nisn: $('input#nisn').val(),
                            name: $('input#name').val(),
                            email: $('input#email').val(),
                            role: $('select#role').val(),
                            info: $("input[type='radio'][name='info']:checked").val()
                        },
                        success: function(res) {
                            if (res.success) {
                                swal('User berhasil diubah!', '', 'success').then(() => window.location.reload());
                            } else {
                                swal({ title: "Nisn atau Email sudah digunakan!", icon: "warning", dangerMode: true });
                            }
                        },
                        error: function(xhr) {
                            swal({ title: "Data tidak valid!", icon: "warning", dangerMode: true });
                        }
                    });
                }
            });
        }

        // Hapus user
        function deleteUser(user) {
            swal({
                title: `Yakin ingin menghapus?`,
                text: "Hapus Permanen User",
                icon: "warning",
                buttons: [true, "Yakin"],
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/master-user/" + user,
                        type: "POST",
                        data: { _token: $('meta[name=csrf-token]').attr("content"), userId: user },
                        success: function(res) {
                            if (res.success) {
                                swal('User berhasil dihapus!', '', 'success').then(() => window.location.reload());
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });
        }
    </script>
@endpush
