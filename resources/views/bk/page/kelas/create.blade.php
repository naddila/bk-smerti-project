@extends('layouts.main')
@section('title', 'Master Kelas')

@section('content')
<div class="container">
    <h1>Tambah Kelas</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('master-kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas') }}" required>
            @error('nama_kelas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn" style="background-color:#395886; color:white ">Simpan</button>
        <a href="{{ route('master-kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
