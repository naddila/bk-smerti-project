@extends('layouts.main')
@section('title', 'Ubah Password')
@section('content')
    <div class="row d-flex">
        <div class="card col-md-2" style="opacity: 0"></div>
        <div class="card col-md-6 offset-lg-1">
            <div class="card-header text-white" style="background-color:#395886">
                <h3 class="mt-2">
                    Ubah Password
                </h3>
            </div>

            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="/ubah-pass/{{ auth()->user()->id }}" method="post" id="change_pass_form">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="oldPasswordInput" class="form-label">Password Lama</label>
                        <input name="old_password" type="password"
                            class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                            placeholder="Password Lama">
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newPasswordInput" class="form-label">Password Baru</label>
                        <input name="new_password" type="password"
                            class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                            placeholder="Password Baru">
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmNewPasswordInput" class="form-label">Konfirmasi Password</label>
                        <input name="new_password_confirmation" type="password" class="form-control"
                            id="confirmNewPasswordInput" placeholder="Konfirmasi Password">
                    </div>
                    <div class="card-footer" style="padding: 10px 15px;">
                        <a class="btn btn-sm btn-secondary" href="/home">Kembali</a>
                        <button type="submit" class="btn btn-sm btn-success" id="btn-pass" style="background-color: #395886; border-color: #395886;">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
