@extends('layouts.main')
@section('title', 'Histori Siswa')
@section('content')
    <div class="row justify-content-center">
        <div class="card shadow-lg px-0" style="width: 100%; max-width: 800px;">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #395886; color: white; border-radius: 0.25rem 0.25rem 0 0;">
                <h3 class="fw-bolder mt-2 mb-0">
                    Histori {{ $siswa->nama }}
                </h3>
                @if ($histories)
                    <form action="/master-histori/{{ $siswa->id }}" method="get" id="form_history" class="form-inline">
                        <input type="date" name="tanggal" id="tanggal" onchange="history()"
                            class="form-control form-control-sm ms-2" value="{{ request('tanggal') }}" style="min-width: 150px;">
                    </form>
                @endif
            </div>

            <div class="card-body py-3">
                @if (request('tanggal'))
                <h5 class="text-primary fw-bold">Pelanggaran Tanggal: {{ $tanggal }}</h5>
                    @forelse ($histories as $history)
                        <div class="list-group mb-3">
                            <div class="list-group-item list-group-item-action flex-column align-items-start rounded shadow-sm"
                                style="background-color: #f8faff; border-color: #eef2ff;">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="text-dark fw-bold">
                                        {{ $history->siswa->kelas->nama_kelas }} - {{ $history->siswa->nama }}
                                    </span>
                                    <small class="text-muted">{{ $history->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1 text-secondary">{{ $history->rule->nama }}</p>
                                <span class="badge bg-danger py-1 px-3">+{{ $history->rule->poin }}</span>
                            </div>
                        </div>
                    @empty
                        <h5 class="text-secondary text-center py-3">Histori tidak ditemukan.</h5>
                    @endforelse
                @else
                    @forelse ($tanggal as $tgl)
                        <h5 class="fw-bold mb-3 text-primary">Tanggal: {{ date('d-m-Y', strtotime($tgl)) }}</h5>
                        @foreach ($histories as $history)
                            @if ($history->getAttribute('tanggal') == $tgl)
                                <div class="list-group mb-3">
                                    <div class="list-group-item list-group-item-action flex-column align-items-start rounded shadow-sm"
                                        style="background-color: #f8faff; border-color: #eef2ff;">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="text-dark fw-bold">
                                                {{ $history->siswa->kelas->nama_kelas }} - {{ $history->siswa->nama }}
                                            </span>
                                            <small class="text-muted">{{ $history->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-1 text-secondary">{{ $history->rule->nama }}</p>
                                        <span class="badge bg-danger py-1 px-3">+{{ $history->rule->poin }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @empty
                        <h5 class="text-secondary text-center py-3">Histori tidak ditemukan.</h5>
                    @endforelse
                @endif
            </div>

            <div class="card-footer d-flex justify-content-end" style="background-color: #f8faff; border-radius: 0 0 0.25rem 0.25rem;">
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
