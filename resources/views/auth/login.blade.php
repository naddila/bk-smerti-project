@extends('layouts.data')
@section('title', 'Login')
@section('datas')
    <div style="display: grid; place-items: center; height: 100vh;">
        <div class="login-container-wrapper clearfix" style="max-width: 325px; background-color:white;">
            <div class="welcome" style="color:#395886">Login</div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form class="form-horizontal login-form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group relative float">
                    <input id="nisn" type="text" class="form-control input-lg" name="nisn"
                        value="{{ old('nisn') }}" required autocomplete="nisn">
                    <label>Nisn or Email</label>
                </div>

                <div class="form-group relative password float">
                    <input id="password" class="form-control input-lg" name="password" type="password" required>
                    <label>Password</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block"
                        style="color:white; background-color: #395886">{{ __('Login') }}</button>
                </div>

                <div class="text-center">
                    <label style="color:#395886">Belum punya akun? <a href="/register" style="color:#395886"><br>Daftar
                            Disini</a></label>
            </form>
        </div>
    </div>
@endsection
