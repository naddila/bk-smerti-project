@extends('layouts.main')
@section('title', 'Sanksi')
@section('content')
    <div class="row justify-content-center">
        <div class="card shadow px-0">
            <div class="card-header" style="background-color: #395886">
                <h3 class="fw-bolder mt-2 text-white">
                    Sanksi Pelanggaran
                </h3>
            </div>
            <div class="card-body py-0">
                @if ($pesan->count())

                    @foreach ($pesan as $msg)
                        <div class="list-group my-2">
                            <div class="border-hover list-group-item list-group-item-action flex-column align-items-start py-1 px-3 mt-2 mb-1"
                                style="background-color: #d3def8; border-color: #d3def8; border-radius: 6px;">
                                <div class="histori-part row" style="margin-bottom: .5rem;">
                                    <div class="col-lg-2 row" style="margin-top: .5rem;">
                                        <small class="px-0"
                                            style="height: 20px; width: auto;">{{ $msg->created_at->diffForHumans() }}</small>
                                    </div>
                                    <div class="col-lg-10">
                                        <p class="mb-1 mt-2 h6 text-dark" style="font-size: 16px;">
                                            {{ $msg->pesan->tindak_lanjut }}
                                        </p>
                                        <div class="text-danger d-inline-flex flex-column" style="gap: 0.5rem;">

                                            @if ($msg->pesan->tingkatan == 'Ringan')
                                                @if ($msg->status == 0)
                                                    <p class="mb-1 mt-2 h6 text-danger"
                                                        style="font-size: 14px; margin-bottom: 0;">
                                                        Mendapat teguran dari Wali Kelas!
                                                    </p>
                                                    <p class="mb-0" style="color: #395886; font-size: 14px;">
                                                        Belum Terlaksana
                                                    </p>
                                                @else
                                                    <p class="mb-1 mt-2 h6" style="color: #395886; font-size: 14px;">
                                                        Kedepannya jangan melanggar lagi ya!
                                                    </p>
                                                    <p class="mb-0" style="color: #395886; font-size: 14px;">
                                                        Selesai - {{ $msg->created_at->format('d/m/Y') }}
                                                    </p>
                                                @endif
                                            @else
                                                @if ($msg->status == 0)
                                                    <p class="mb-1 mt-2 h6 text-danger"
                                                        style="font-size: 14px; margin-bottom: 0;">
                                                        Segera lakukan bimbingan dengan Guru BK karena poin pelanggaran
                                                        sudah mencapai batas pelanggaran.
                                                    </p>
                                                    <p class="mb-0" style="color: #395886; font-size: 14px;">
                                                        Tunggu Jadwal Bimbingan
                                                    </p>
                                                @elseif ($msg->status == 1)
                                                    <p class="mb-1 mt-2 h6 text-danger"
                                                        style="font-size: 14px; margin-bottom: 0;">
                                                        Segera lakukan bimbingan dengan Guru BK karena poin pelanggaran
                                                        sudah mencapai batas pelanggaran.
                                                    </p>
                                                    <a class="btn" style="background-color: #395886; color: white;"
                                                        href="/storage/surat/{{ $msg->berkas }}" target="_blank"
                                                        rel="noopener noreferrer">
                                                        <i class="fas fa-download me-1"></i> Unduh Surat
                                                    </a>
                                                @elseif ($msg->status == 2)
                                                    <p class="mb-1 mt-2 h6" style="color: #395886; font-size: 14px;">
                                                        Kedepannya jangan melanggar lagi ya!
                                                    </p>
                                                    <p class="mb-0" style="color: #395886; font-size: 14px;">
                                                        Selesai - {{ $msg->created_at->format('d/m/Y') }}
                                                    </p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h5 class="text-secondary text-center py-1 mt-4">Tidak ada sanksi</h5>
                @endif

            </div>
            <div class="text-end card-footer mt-3">
                <div class="mx-4 text-decoration-none float-right">
                    {{ $pesan->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
