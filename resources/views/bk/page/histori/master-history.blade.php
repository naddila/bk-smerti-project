@extends('layouts.main')
@section('title', 'Data Histori')
@section('content')
    <div class="card" style="background-color: white;">
        <div class="card-body">
            <form action="/master-histori" method="get" id="form_history" class="mb-3">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <input type="date" name="tanggal" id="tanggal" onchange="history()" class="form-control"
                            value="{{ request('tanggal') }}">
                    </div>
                </div>
            </form>

            @if (request('tanggal'))
                <h5 class="text-center mb-3">Pelanggaran Tanggal: {{ $tanggal }}</h5>
            @endif

            @if ($histories->count())
                <table class="table table-bordered w-100" style="border-collapse: collapse;">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Pelanggaran</th>
                            <th>Poin</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $index => $history)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $history->siswa->nama }}</td>
                                <td>{{ $history->siswa->kelas->nama_kelas }}</td>
                                <td>{{ $history->rule->nama }}</td>
                                <td class="text-danger">+{{ $history->rule->poin }}</td>
                                <td>{{ $history->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-muted">Tidak ada histori pelanggaran ditemukan.</p>
            @endif
        </div>
        @if ($histories->hasPages())
            <div class="card-footer text-center">
                {{ $histories->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        function history() {
            document.getElementById("form_history").submit();
        }
    </script>
@endpush
