@extends('layouts.main')
@section('title', 'Data Peraturan')
@section('content')
    <div class="card shadow px-0">
        <div class="card-header d-flex justify-content-between align-items-center p-3" style="background-color: #395886">
            <h1 class="fw-bolder text-white" style="animation-delay: 0.5s;">Master Peraturan</h1>
            <a href="{{ route('master-peraturan.create') }}" class="btn btn-md btn-light float-end"
                style="animation-delay: 0.5s; color:#395886">
                <i class="fas fa-chalkboard-teach me-1"></i> Tambah Peraturan
            </a>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table id="table_data_peraturan" class="table table-bordered display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Peraturan</th>
                        <th>Poin</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peraturan as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td style="word-wrap: break-word; white-space: normal;">{{ $p->nama }}</td>
                            <td>{{ $p->poin }}</td>
                            <td>{{ $p->jenis_peraturan_id }}</td>
                            <td class="d-flex flex-wrap gap-2">
                                <a href="{{ route('master-peraturan.edit', $p) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('master-peraturan.destroy', $p) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
            var table = $('#table_data_peraturan').DataTable({
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
                    targets: 4 // Kolom Aksi tidak dapat diurutkan
                }],
            });
        });
    </script>
@endpush
