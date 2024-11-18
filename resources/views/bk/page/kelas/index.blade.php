@extends('layouts.main')
@section('title', 'Daftar Kelas')
@push('css')
    <style>
        label.error {
            opacity: 1;
            color: #395886;
            font-size: 13px;
        }
    </style>
@endpush
@section('content')
    <div class="card shadow px-0">
        <div class="card-header d-flex justify-content-between align-items-center p-3" style="background-color:#395886">
            <h1 class="fw-bolder text-white animate__animated mb-0" style="animation-delay: 0.5s;">Daftar Kelas</h1>
            <a href="{{ route('master-kelas.create') }}"
                class="btn btn-md btn-light float-end"
                style="animation-delay: 0.5s;">
                <i class="fas fa-chalkboard-teach me-1" style="color: #395886"></i> Tambah Kelas
            </a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table id="table_data_kelas" class="table table-bordered display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $k)
                        <tr>
                            <td>{{ $k->id }}</td>
                            <td>{{ $k->nama_kelas }}</td>
                            <td>
                                <a href="{{ route('master-kelas.edit', $k) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pen"></i> Edit
                                </a>
                                <!-- Button Delete -->
                                <form action="{{ route('master-kelas.destroy', $k) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#table_data_kelas').DataTable({
                pageLength: 10, // Sesuaikan jumlah data yang ditampilkan per halaman di DataTables
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
            });
        });
    </script>
@endpush
