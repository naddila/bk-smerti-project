@extends('layouts.main')
@section('title', 'Data Histori')
@section('content')
    <div class="row justify-content-center">
        <div class="card shadow-lg p-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #395886;">
                <h3 class="fw-bolder text-white mb-0">Histori Siswa</h3>
                <form action="/osis/master-history" method="get" id="form_history" class="d-inline">
                    <input type="date" name="tanggal" id="tanggal" onchange="history()"
                        class="form-control form-control-sm" value="{{ request('tanggal') }}">
                </form>
            </div>
            <div class="card-body">
                @if (request('tanggal'))
                    <div class="mb-3">
                        <h5 class="text-primary fw-bold">Pelanggaran Tanggal: {{ $tanggal }}</h5>
                    </div>
                    @forelse ($histories as $history)
                        <div class="card mb-3 shadow-sm border-0" style="border-radius: 8px; background-color: #f8faff;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <a href="/osis/master-history/{{ $history->siswa->id }}" class="text-dark fw-bold">
                                        {{ $history->siswa->kelas->nama_kelas }} - {{ $history->siswa->nama }}
                                    </a>
                                    <small class="text-muted">{{ $history->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="text-secondary mb-2"><i class="bi bi-exclamation-circle-fill"></i> {{ $history->rule->nama }}</p>
                                <span class="badge bg-danger py-2 px-3">+{{ $history->rule->poin }}</span>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center">Tidak ada histori pelanggaran yang ditemukan.</p>
                    @endforelse
                @else
                    @forelse ($tanggal as $tgl)
                        <h5 class="text-primary fw-bold mt-4">Tanggal: {{ date('d-m-Y', strtotime($tgl)) }}</h5>
                        @foreach ($histories as $history)
                            @if ($history->getAttribute('tanggal') == $tgl)
                                <div class="card mb-3 shadow-sm border-0" style="border-radius: 8px; background-color: #f8faff;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <a href="/osis/master-history/{{ $history->siswa->id }}" class="text-dark fw-bold">
                                                {{ $history->siswa->kelas->nama_kelas }} - {{ $history->siswa->nama }}
                                            </a>
                                            <small class="text-muted">{{ $history->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="text-secondary mb-2"><i class="bi bi-exclamation-circle-fill"></i> {{ $history->rule->nama }}</p>
                                        <span class="badge bg-danger py-2 px-3">+{{ $history->rule->poin }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @empty
                        <p class="text-muted text-center">Tidak ada histori pelanggaran yang ditemukan.</p>
                    @endforelse
                @endif
            </div>
            <div class="card-footer d-flex justify-content-center">
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
            document.getElementById("form_history").submit();
        }
    </script>
@endpush
