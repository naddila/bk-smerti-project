@extends('layouts.main')
@section('title', 'Edit Peraturan')
@section('content')
<div class="container">
    <h1>Edit Peraturan</h1>
    <form action="{{ route('master-peraturan.update', $peraturan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Peraturan</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ $peraturan->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="poin" class="form-label">Poin</label>
            <input type="number" name="poin" class="form-control" id="poin" value="{{ $peraturan->poin }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis_peraturan_id" class="form-label">Kategori</label>
            <input type="text" name="jenis_peraturan_id" class="form-control" id="jenis_peraturan_id" value="{{ $peraturan->jenis_peraturan_id }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
