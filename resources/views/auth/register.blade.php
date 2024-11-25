@extends('layouts.data')
@section('title', 'Register')
@section('datas')
    <style>
        .float input[type="email"]:not(:placeholder-shown)~label {
            top: -43px;
            left: -10px;
            color: #ddd;
            font-size: 13px;
        }
    </style>
    <div class="container" style="margin-top: 3%; margin-bottom: 3%; height:100%;">
        <div class="login-container-wrapper clearfix" style="max-width: 300px;background-color:white;">
            <div class="welcome" style="color:#395886">Registrasi</div>
            <form class="form-horizontal login-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="col-lg-6 col-sm-12 px-0 outer" style="max-width: 300px;background-color:white;">
                    <div class="form-group relative float">
                        @error('nisn')
                            <div class="alert alert-error text-right mb-1" style="padding: 0; font-size:12px;">
                                <strong>* {{ $message }}</strong>
                            </div>
                        @enderror
                        <input id="nisn" type="text"
                            class="form-control input-lg mb-1 @error('nisn') is-invalid @enderror" name="nisn"
                            value="{{ old('nisn') }}" required autocomplete="nisn" autofocus>
                        <label>NISN</label>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 px-0 outer" style="max-width: 300px;background-color:white;">
                    <div class="form-group relative float">
                        @error('email')
                            <div class="alert alert-error text-right mb-1" style="padding: 0; font-size:12px;">
                                <strong>* {{ $message }}</strong>
                            </div>
                        @enderror
                        <input id="email" type="email"
                            class="form-control input-lg mb-1 mt-4 @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" placeholder=" ">
                        <label>Email</label>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 px-0 outer" style="max-width: 300px;background-color:white;">
                    <div class="form-group relative float password one">
                        <input id="password" type="password" class="form-control input-lg mb-1 mt-4" name="password"
                            required autocomplete="new-password">
                        <label>Password</label>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 px-0 outer" style="max-width: 300px;background-color:white;">
                    <div class="form-group relative float password two">
                        @error('password')
                            <div class="alert alert-error text-right mb-1" style="padding: 0; font-size:12px;">
                                <strong>* {{ $message }}</strong>
                            </div>
                        @enderror
                        <input id="password-confirm" type="password"
                            class="form-control input-lg mb-1 mt-4 @error('password') is-invalid @enderror"
                            name="password_confirmation" required autocomplete="new-password">
                        <label>Konfirmasi Password</label>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 px-0 outer" style="max-width: 300px;background-color:white;">
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block"
                        style="background-color:#395886;color:white">{{ __('Registrasi') }}</button>
                </div>
            </div>
                <div class="text-center">
                    <label style="color:#395886">Sudah punya akun? <a href="/login"
                            style="color:#395886;">Login</a></label>
                </div>
            </form>
        </div>
    </div>

@endsection
