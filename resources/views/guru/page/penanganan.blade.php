@extends('layouts.main')
@section('title', 'Penanganan')
@section('content')
    <div class="row justify-content-center">
        <div class="card" style="background-color: white;">
            <div class="card-body">
                <table id="table_data_user" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Penanganan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penanganan as $tindak)
                            <tr>
                                <td scope="row">
                                    {{ ($penanganan->currentpage() - 1) * $penanganan->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $tindak->siswa->nama }}</td>
                                <td>{{ $tindak->pesan->tindak_lanjut }}</td>
                                <td>
                                    @if ($tindak->status == 0)
                                        <form action="/guru/penanganan/{{ $tindak->id }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="background-color: #395886; color:white;">Selesai</button>
                                        </form>
                                    @else
                                        <button class="btn btn-sm" style="background-color: #395886; color:white;" disabled>Selesai -
                                            {{ $tindak->created_at->format('d/m/Y') }}</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
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
                "columnDefs": [{
                        "orderable": false,
                        "targets": 1
                    },
                    {
                        "orderable": false,
                        "targets": 2
                    },
                    {
                        "orderable": false,
                        "targets": 3
                    },
                ],
                "pageLength": 10
            });
        });
    </script>
@endpush
