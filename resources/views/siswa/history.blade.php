@extends('layouts.main')
@section('title', 'Riwayat Pelanggaran')
@section('content')
    <div class="row justify-content-center">
        <div class="card" style="background-color: white;">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="fw-bolder mt-2 text-dark">
                    Riwayat Pelanggaran {{ Auth::user()->name }}
                </h3>
            </div>
            <div class="card-body py-0">
                @if ($histories->count())
                    <div class="table-responsive">
                        @foreach ($tanggal as $tgl)
                            <h6 class="fw-bold" style="color: #395886">{{ date('d-m-Y', strtotime($tgl)) }}</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Pelanggaran</th>
                                        <th>Poin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($histories as $history)
                                        @if ($history->getAttribute('tanggal') == $tgl)
                                            <tr>
                                                <td>{{ $tgl }}</td>
                                                <td>{{ $history->rule->nama }}</td>
                                                <td class="text-danger font-weight-bold">+{{ $history->rule->poin }}</td>
                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        @endforeach
                    </div>
                @else
                    <h5 class="text-secondary text-center py-1 mt-4">Histori tidak ada</h5>
                @endif

            </div>
            <div class="text-end card-footer mt-3">
                <div class="mx-4 text-decoration-none float-right">
                    {{ $histories->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
