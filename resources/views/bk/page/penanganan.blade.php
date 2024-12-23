@extends('layouts.main')
@section('title', 'Penanganan')
@section('content')
    <div class="row justify-content-center">
        <div class="card" style="background-color: white;">
            <div class="card-body">
                <table id="table_data_user" class="table table-bordered w-100" style="border-collapse: collapse;">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Penanganan</th>
                            <th>Status</th>
                            <th>Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penanganan as $tindak)
                            <tr>
                                <td scope="row">
                                    {{ ($penanganan->currentpage() - 1) * $penanganan->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $tindak->siswa->nama }}</td>
                                <td>{{ $tindak->siswa->kelas->nama_kelas }}</td>
                                <td>{{ $tindak->pesan->tindak_lanjut }}</td>
                                <td>
                                    @if ($tindak->pesan->tingkatan == 'Ringan')
                                        @if ($tindak->status == 0)
                                            <form action="/penanganan/{{ $tindak->id }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">Selesai</button>
                                            </form>
                                        @else
                                            <button class="btn btn-secondary btn-sm" disabled>Selesai -
                                                {{ $tindak->created_at->format('d/m/Y') }}</button>
                                        @endif
                                    @else
                                        @if ($tindak->status == 0)
                                            <a href="#modalCenter{{ $tindak->id }}" role="button" class="btn btn-sm btn-primary"
                                                data-bs-toggle="modal">Kirim
                                                Jadwal</a>
                                        @endif
                                        @if ($tindak->status == 1)
                                            <form action="/penanganan/{{ $tindak->id }}" method="post">
                                                @csrf
                                                <button class="btn btn-sm btn-primary">Selesai</button>
                                            </form>
                                        @endif
                                        @if ($tindak->status == 2)
                                            <button class="btn btn-sm btn-primary" disabled>Selesai -
                                                {{ $tindak->created_at->format('d/m/Y') }}</button>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if ($tindak->berkas)
                                        <a href="{{ Storage::url('surat/' . $tindak->berkas) }}" class="btn"
                                            target="_blank" rel="noopener noreferrer">
                                            <button class="btn btn-sm fas fa-download btn-primary"></button>
                                        </a>
                                    @else
                                        -
                                    @endif

                                </td>
                            </tr>
                            <div id="modalCenter{{ $tindak->id }}" class="modal fade" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header py-2">
                                            <h5 class="modal-title ps-2">Jadwal Konsultasi</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/penanganan/{{ $tindak->id }}" method="post">
                                                @csrf
                                                <div class="form-floating mb-2">
                                                    <input required type="date" name="date"
                                                        class="form-control form-input-lg @error('date') is-invalid @enderror"
                                                        value="{{ old('date') }}">
                                                    <label for="date">Date</label>
                                                    @error('date')
                                                        <div class="invalid-feedback mb-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input required type="time" name="time"
                                                        class="form-control form-input-lg @error('time') is-invalid @enderror"
                                                        value="{{ old('time') }}">
                                                    <label for="time">Time</label>
                                                    @error('time')
                                                        <div class="invalid-feedback mb-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="modal-footer py-2">
                                            <button type="button" class="btn btn-sm  btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-sm"
                                                style="background-color: #395886; color:white">Kirim</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                        "targets": 3
                    },
                    {
                        "orderable": false,
                        "targets": 4
                    },
                ],
                "pageLength": 10
            });
        });
    </script>
@endpush
