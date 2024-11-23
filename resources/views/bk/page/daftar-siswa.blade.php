@extends('layouts.main')
@section('title', 'Pelanggaran Siswa')
@section('content')
    <div class="card" style="background-color: white;">
        <div class="card-body">
            <table id="table_data_user" class="table table-bordered w-100" style="border-collapse: collapse;"
                style="z-index: 2;">
                <thead class="thead-inverse">
                    <th>No.</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                        <tr>
                            <td scope="row">{{ ($siswas->currentpage() - 1) * $siswas->perpage() + $loop->index + 1 }}
                            </td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->kelas->nama_kelas }}</td>
                            <td><a href="/histori/{id}{{ $siswa->id }}"
                                    @if ($siswa->poin == 0) style="color:green;" @endif
                                    @if ($siswa->poin <= 45) style="color:#fcbc05;" @endif
                                    @if ($siswa->poin <= 80) style="color:#fd5d03;" @endif
                                    @if ($siswa->poin >= 85) style="color:red;" @endif>
                                    <b>{{ $siswa->poin }}</b>
                                </a>
                            </td>
                            <td data-label="Posisi">
                                <!-- Button Info -->
                                <button type="button" class="btn btn-sm btn-info mb-1" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter{{ $siswa->id }}">Data Siswa
                                </button>
                                <!-- Button Tambah -->
                                <a href="/pelanggaran/tambah/{{ $siswa->nisn }}" class="btn btn-sm btn-danger mb-1">Catat Poin
                                </a>
                                <a href="{{ url('/histori/' . $siswa->id) }}" class="btn btn-sm btn-warning mb-1">Pelanggaran
                                </a>
                            </td>
                        </tr>

                        {{-- Modal Detail --}}
                        <div id="modalCenter{{ $siswa->id }}" class="modal fade" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header py-2">
                                        <h5 class="modal-title ps-2">Detail Siswa</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row ing ps-2 py-1">
                                            <div class="col-4 dem">TTL</div>
                                            <div class="pisah">:</div>
                                            <div class="col-7">
                                                {{ $siswa->ttl }}
                                            </div>
                                        </div>
                                        <div class="row ing ps-2 py-1">
                                            <div class="col-4 dem">JK</div>
                                            <div class="pisah">:</div>
                                            <div class="col-7">
                                                {{ $siswa->jk }}
                                            </div>
                                        </div>
                                        <div class="row ing ps-2 py-1">
                                            <div class="col-4 dem">Agama</div>
                                            <div class="pisah">:</div>
                                            <div class="col-7">
                                                {{ $siswa->agama }}
                                            </div>
                                        </div>
                                        <div class="row ing ps-2 py-1">
                                            <div class="col-4 dem">Alamat</div>
                                            <div class="pisah">:</div>
                                            <div class="col-7">
                                                {{ $siswa->alamat }}
                                            </div>
                                        </div>
                                        <div class="row ing ps-2 py-1">
                                            <div class="col-4 dem">No.Telp</div>
                                            <div class="pisah">:</div>
                                            <div class="col-7">
                                                <a class="linkind" style="color: #395886" href="tel:{{ $siswa->no_telp }}">
                                                    {{ $siswa->no_telp }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row ing ps-2 py-1">
                                            <div class="col-4 dem">No.Telp Rumah</div>
                                            <div class="pisah">:</div>
                                            <div class="col-7">
                                                <a class="linkind" style="color: #395886"
                                                    href="tel:{{ $siswa->no_telp_rumah }}">
                                                    {{ $siswa->no_telp_rumah }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer p-2 bg-light">
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
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
                        "width": "30%",
                        "targets": 2
                    },
                    {
                        "orderable": false,
                        "targets": 5
                    },
                ],
                "pageLength": 10
            });
        });
    </script>
@endpush
