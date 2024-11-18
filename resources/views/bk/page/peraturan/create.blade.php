@extends('layouts.main')
@section('title', 'Tambah Peraturan')
@section('content')
<div class="container">
    <h1>Tambah Peraturan</h1>
    <form action="{{ route('master-peraturan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Peraturan</label>
            <input type="text" name="nama" class="form-control" id="nama" required>
        </div>
        <div class="mb-3">
            <label for="poin" class="form-label">Poin</label>
            <input type="number" name="poin" class="form-control" id="poin" required>
        </div>
        <div class="mb-3">
            <label for="jenis_peraturan_id" class="form-label">Kategori</label>
            <input type="text" name="jenis_peraturan_id" class="form-control" id="jenis_peraturan_id" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
