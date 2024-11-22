@extends('layouts.main')
@section('title', 'Sanksi')
@section('content')
    <div class="row justify-content-center">
        <div class="card-body py-0">
            @if ($pesan->count())
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="text-white" style="background-color: #395886">
                            <tr>
                                <th>Sanksi</th>
                                <th>Status</th>
                                <th>Surat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesan as $msg)
                                <tr>
                                    <td>{{ $msg->pesan->tindak_lanjut }}</td>
                                    <td>
                                        @if ($msg->pesan->tingkatan == 'Ringan')
                                            @if ($msg->status == 0)
                                                Belum Terlaksana
                                            @else
                                                Selesai
                                            @endif
                                        @else
                                            @if ($msg->status == 0)
                                                Tunggu Jadwal Bimbingan
                                            @elseif ($msg->status == 1)
                                                Segera Bimbingan
                                            @elseif ($msg->status == 2)
                                                Selesai
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($msg->pesan->tingkatan == 'Ringan')
                                            Tidak Ada Berkas
                                        @else
                                            @if ($msg->status == 0)
                                                Tidak Ada Berkas
                                            @elseif ($msg->status == 1)
                                                <a class="btn btn-sm text-white" style="background-color: #395886" href="/storage/surat/{{ $msg->berkas }}"
                                                    target="_blank">Unduh Surat</a>
                                            @else
                                            Tidak Ada Berkas
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h5 class="text-secondary text-center py-1 mt-4">Tidak ada sanksi</h5>
            @endif
        </div>
    </div>
@endsection
