@extends('layouts.main')
@section('title', 'Riwayat Pelanggaran Siswa')

@section('content')
    <div class="container-fluid">
        <div class="card" style="background-color: white;">
            <!-- Card Header -->
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="fw-bold mb-0">Riwayat Pelanggaran {{ $siswas->nama }}</h3>
            </div>

            <!-- Card Body -->
            <div class="card-body py-0">
                @forelse ($tanggal as $tgl)
                <h6 class="fw-bold" style="color: #395886">{{ date('d-m-Y', strtotime($tgl)) }}</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Pelanggaran</th>
                                    <th>Poin</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                    @if ($history->getAttribute('tanggal') == $tgl)
                                        <tr>
                                            <td>{{ $history->siswa->nama }}</td>
                                            <td>{{ $history->siswa->kelas->nama_kelas }}</td>
                                            <td>{{ $history->rule->nama }}</td>
                                            <td class="text-center"><span
                                                    class="badge bg-danger">+{{ $history->rule->poin }}</span></td>
                                            <td>{{ $history->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @empty
                    <h5 class="text-secondary text-center py-4">Histori tidak ada</h5>
                @endforelse
            </div>

            <!-- Card Footer -->
            <div class="card-footer d-flex justify-content-end">
                <ul class="pagination">
                    {{ $histories->links('pagination::bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function history() {
            document.getElementById('form_history').submit();
        }
    </script>
@endpush
