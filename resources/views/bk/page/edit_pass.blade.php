@extends('layouts.main')
@section('title', 'Ubah Password')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="card col-md-6">
            <div class="card-body" style="background-color: white;">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('bk.edit_pass', ['id' => auth()->user()->id]) }}" method="post" id="change_pass_form">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="oldPasswordInput" class="form-label">Password Lama</label>
                        <input name="password_lama" type="password"
                            class="form-control @error('password_lama') is-invalid @enderror" id="oldPasswordInput"
                            placeholder="Masukkan Password Lama">
                        @error('password_lama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newPasswordInput" class="form-label">Password Baru</label>
                        <input name="password_baru" type="password"
                            class="form-control @error('password_baru') is-invalid @enderror" id="newPasswordInput"
                            placeholder="Masukkan Password Baru">
                        @error('password_baru')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmNewPasswordInput" class="form-label">Konfirmasi Password</label>
                        <input name="new_password_confirmation" type="password"
                            class="form-control" id="confirmNewPasswordInput"
                            placeholder="Konfirmasi Password Baru">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-secondary btn-sm" href="/home">Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
