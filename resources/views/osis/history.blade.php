@extends('layouts.main')
@section('title', 'Riwayat Pelanggaran Siswa')
@section('content')
    <div class="container-fluid">
        <div class="card" style="background-color: white;">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="fw-bold mb-0">Riwayat Pelanggaran {{ $siswa->nama }}</h3>
            </div>
            <div class="card-body">
                {{-- menampilkan riwayat pelanggaran --}}
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
                    <p class="text-center text-muted">Riwayat tidak ditemukan.</p>
                @endforelse
            </div>
            <div class="card-footer bg-white d-flex justify-content-end">
                <div class="pagination">
                    {{ $histories->links() }}
                </div>
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
