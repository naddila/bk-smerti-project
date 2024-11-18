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
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #395886" >
            <h3 class="fw-bolder mt-2 d-inline-flex text-white"
                style="animation-delay: 0.5s;">Daftar Pengguna</h3>
                <button type="button"
                class="button-success fas fa-user-plus me-1 btn btn-md btn-light float-end"
                data-bs-toggle="modal" data-bs-target="#addUserModal"
                style="color: #395886;">
            Tambah
        </button>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table id="table_data_user" class="table table-bordered display" cellspacing="0" width="100%">
                <thead class="thead-inverse">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Registrasi</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        {{-- get and loop data --}}
                        <tr>
                            <td scope="row">
                                {{ $loop->iteration }}
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if ($user->info == 1)
                                <td class="text-success">Sudah</td>
                            @else
                                <td class="text-danger">Belum</td>
                            @endif
                            @if ($user->role == 1)
                                <td style="font-weight:600; color:#395886;">BK</td>
                            @endif
                            @if ($user->role == 2)
                                <td style="font-weight:500; color:#628ecb;">Guru</td>
                            @endif
                            @if ($user->role == 3)
                                <td style="font-weight:500; color: #628ecb;">Siswa</td>
                            @endif
                            @if ($user->role == 4)
                                <td style="font-weight:500;color:#628ecb;">Osis</td>
                            @endif
                            <td>
                                {{-- button edit dan delete --}}
                                <button class="btn btn-sm btn-warning btn-detail open_modal" value="{{ $user->id }}">
                                    <i class="fas fa-pen"></i> Edit
                                </button>
                                <button type="button" onclick="deleteUser({{ $user->id }})"
                                    class="btn btn-sm btn-danger">
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
                    },
                    aria: {
                        paginate: {
                            first: 'First',
                            previous: 'Previous',
                            next: 'Next',
                            last: 'Last'
                        }
                    },
                },
                'columnDefs': [{
                        orderable: false,
                        responsivePriority: 1,
                        targets: 1
                    },
                    {
                        orderable: false,
                        targets: 2
                    },
                    {
                        orderable: false,
                        responsivePriority: 2,
                        targets: 5
                    },
                ],
            });

        });

        // form edit user
        $(document).on('click', '.open_modal', function() {
            var url = "/master-user";
            var user_id = $(this).val();
            $.get(url + '/' + user_id + '/' + 'edit', function(data) {
                //success data
                const target = "{{ url('master-user/:id') }}".replace(':id', data.id)
                const pass = "{{ url('change-pass/:id') }}".replace(':id', data.id)
                $('input#user_id').val(data.id);
                $('input#nisn').val(data.nisn);
                $('input#name').val(data.name);
                $('input#email').val(data.email);
                $('select#role').val(data.role).change();
                if (data.info == '0') {
                    $('input#info2').prop('checked', true);
                } else {
                    $('input#info').prop('checked', true);
                };
                $('#editform').attr('action', target);
                $('#change_pass_form').attr('action', pass);
                $('#myModal').modal('show');
            })
        });

        // edit user
        function editUser(event) {
            var url = $('form#editform').attr('action');
            $('form#editform').validate({ // initialize the plugin
                rules: {
                    nisn: {
                        number: true,
                        required: true,
                        minlength: 8,
                        maxlength: 10,
                    },
                    name: {
                        required: true,
                        maxlength: 255
                    },
                    email: {
                        required: true,
                        maxlength: 255,
                        email: true
                    },
                    role: {
                        required: true,
                    },
                },
                messages: {
                    nisn: {
                        number: "* Nisn harus berupa angka!",
                        required: "* Nisn harus diisi!",
                        minlength: "* Nisn minimal 8 digit!",
                        maxlength: "* Nisn maksimal 10 digit!",
                    },
                    name: {
                        required: "* Nama harus diisi!",
                        maxlength: "* Nama maksimal 255 karakter!"
                    },
                    email: {
                        required: "* Email harus diisi!",
                        maxlength: "* Email maksimal 255 karakter!",
                        email: "* Masukkan Email yang valid",
                    }
                },
                submitHandler: function(form) {
                    $("#btn-update").attr("disabled", true);

                    let nisn = $('input#nisn').val();
                    let name = $('input#name').val();
                    let email = $('input#email').val();
                    let role = $('select#role').val();
                    let info = $("input[type='radio'][name='info']:checked").val();
                    $.ajax({
                        url: url,
                        type: "PUT",
                        data: {
                            _token: $('meta[name=csrf-token]').attr("content"),
                            nisn,
                            name,
                            email,
                            role,
                            info
                        },
                        success: function(res) {
                            if (res.success) {
                                swal(
                                    'User berhasil diubah!',
                                    "",
                                    'success'
                                ).then((result) => {
                                    window.location.reload();
                                });
                                console.log(res);
                            } else {
                                console.log(res.errors);
                                $.each(res.errors, function(key, val) {

                                    swal({
                                        title: "Nisn atau Email sudah digunakan!",
                                        icon: "warning",
                                        dangerMode: true,
                                        button: true,
                                    });
                                });
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            swal({
                                title: "Data tidak valid!",
                                icon: "warning",
                                dangerMode: true,
                                button: true,
                            });
                        }
                    });
                }
            });
        }

        // hapus user
        function deleteUser(user) {
            event.preventDefault();
            swal({
                    title: `Yakin ingin menghapus?`,
                    text: "Hapus Permanen User",
                    icon: "warning",
                    buttons: [true, "Yakin"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // form.submit();
                        // setTimeout(() => {
                        //     swal("User berhasil dihapus!", "", "success");
                        // }, 1100);
                        $.ajax({
                            url: "/master-user/" + user,
                            type: "POST",
                            data: {
                                _token: $('meta[name=csrf-token]').attr("content"),
                                userId: user
                            },
                            success: function(res) {
                                if (res.success) {
                                    swal(
                                        'User berhasil dihapus!',
                                        "",
                                        'success'
                                    ).then((result) => {

                                        window.location.reload();

                                    });
                                    console.log(res)
                                }
                            },
                            error: function(error) {
                                console.log(error)
                            }
                        });
                    }

                });
        }
    </script>
@endpush
