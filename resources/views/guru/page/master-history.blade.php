@extends('layouts.main')
@section('title', 'Histori Siswa')
@section('content')
    <div class="row justify-content-center">
        <div class="card shadow px-0">
            <!-- Card Header -->
            <div class="card-header text-white" style="background-color: #395886">
                <h3 class="fw-bold d-inline">
                    Histori Siswa Kelas {{ $wali_kelas->kelas->nama_kelas }}
                </h3>
                <form action="/guru/histori" method="get" id="form_history" class="float-end">
                    <input type="date" name="tanggal" id="tanggal" onchange="history()"
                           class="form-control form-control-sm" value="{{ request('tanggal') }}">
                </form>
            </div>

            <!-- Card Body -->
            <div class="card-body py-0">
                @if (request('tanggal'))
                    <p class="text-primary fw-bold mb-3">
                        Pelanggaran Tanggal : {{ $tanggal }}
                    </p>

                    @forelse ($histories as $history)
                        <div class="card mb-3 shadow-sm border-0 rounded bg-light">
                            <div class="p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="/guru/histori/{{ $history->siswa->id }}" class="text-dark fw-bold">
                                        {{ $history->siswa->kelas->nama_kelas }} - {{ $history->siswa->nama }}
                                    </a>
                                    <small class="text-muted">{{ $history->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1 text-dark">{{ $history->rule->nama }}</p>
                                <span class="text-danger fw-bold">+{{ $history->rule->poin }}</span>
                            </div>
                        </div>
                    @empty
                        <h5 class="text-secondary text-center py-3">Histori tidak ada</h5>
                    @endforelse
                @else
                    @forelse ($tanggal as $tgl)
                        <p class="text-primary fw-bold mb-3">
                            Tanggal : {{ date('d-m-Y', strtotime($tgl)) }}
                        </p>

                        @foreach ($histories as $history)
                            @if ($history->getAttribute('tanggal') == $tgl)
                                <div class="card mb-3 shadow-sm border-0 rounded bg-light">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="/guru/histori/{{ $history->siswa->id }}" class="text-dark fw-bold">
                                                {{ $history->siswa->kelas->nama_kelas }} - {{ $history->siswa->nama }}
                                            </a>
                                            <small class="text-muted">{{ $history->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-1 text-dark">{{ $history->rule->nama }}</p>
                                        <span class="text-danger fw-bold">+{{ $history->rule->poin }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @empty
                        <h5 class="text-secondary text-center py-4">Histori tidak ada</h5>
                    @endforelse
                @endif
            </div>

            <!-- Pagination -->
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
            document.getElementById('form_history').submit();
        }
    </script>
@endpush
