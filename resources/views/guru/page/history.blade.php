@extends('layouts.main')
@section('title', 'Histori Siswa')

@section('content')
<div class="row justify-content-center">
    <div class="card shadow px-0">
        <!-- Card Header -->
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #395886; color:white">
            <h3 class="fw-bold mt-2">Histori {{ $siswas->nama }}</h3>
            @if ($histories)
            <form action="/guru/histori/{{ $siswas->id }}" method="get" id="form_history">
                <input type="date" name="tanggal" id="tanggal" onchange="history()"
                    class="form-control form-control-sm"
                    value="{{ request('tanggal') }}">
            </form>
            @endif
        </div>

        <!-- Card Body -->
        <div class="card-body py-0">
            @if (request('tanggal'))
            <p class="text-primary fw-bold mb-1 mt-3">Pelanggaran Tanggal: {{ $tanggal }}</p>
            @forelse ($histories as $history)
            <div class="list-group mt-2">
                <div class="list-group-item border-0 shadow-sm p-3 mb-2" style="background-color: #f8faff; border-radius: 6px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>{{ $history->siswa->kelas->nama_kelas }} - {{ $history->siswa->nama }}</b>
                        <small>{{ $history->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-1 text-dark mt-2">{{ $history->rule->nama }}</p>
                    <div class="text-danger fw-bold">+{{ $history->rule->poin }}</div>
                </div>
            </div>
            @empty
            <h5 class="text-secondary text-center py-4">Histori tidak ada</h5>
            @endforelse
            @else
            @forelse ($tanggal as $tgl)
            <p class="text-primary fw-bold mb-1 mt-3">Tanggal: {{ date('d-m-Y', strtotime($tgl)) }}</p>
            @foreach ($histories as $history)
            @if ($history->getAttribute('tanggal') == $tgl)
            <div class="list-group mt-2">
                <div class="list-group-item border-0 shadow-sm p-3 mb-2" style="background-color: #f8faff; border-radius: 6px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>{{ $history->siswa->kelas->nama_kelas }} - {{ $history->siswa->nama }}</b>
                        <small>{{ $history->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-1 text-dark mt-2">{{ $history->rule->nama }}</p>
                    <div class="text-danger fw-bold">+{{ $history->rule->poin }}</div>
                </div>
            </div>
            @endif
            @endforeach
            @empty
            <h5 class="text-secondary text-center py-4">Histori tidak ada</h5>
            @endforelse
            @endif
        </div>

        <!-- Card Footer -->
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
