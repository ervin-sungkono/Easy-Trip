@extends('layouts.app')

@section('title', 'Easytrip | Daftar')

@section('background')
    style="background-image: url({{asset('images/background-img.png')}})""
@endsection

@section('content')
<div class="container d-flex align-items-center" style="min-height: 85vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded px-2 py-4">
                <div class="card-body">
                    <div class="display-6 playfair text-center fw-semibold mb-3">
                        {{ __('Buat Akun') }}
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3 ">
                            <label for="name" class="col col-form-label text-md-right d-flex " >{{ __('Full Name') }} </label>
                            <div class="input-group mb-2">
                                <i class="bi bi-pencil-fill fs-5 text-secondary input-group-text"></i>
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus placeholder="Nama lengkap anda..">
                            </div>
                            @error('name')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3 ">
                            <label for="email" class="col col-form-label text-md-right d-flex " >{{ __('E-Mail') }} </label>
                            <div class="input-group mb-2">
                                <i class="bi bi-envelope-fill fs-5 text-secondary input-group-text"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email anda..">
                            </div>
                            @error('email')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="input-group mb-2">
                                    <i class="bi bi-key-fill fs-5 text-secondary input-group-text"></i>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password anda..">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">{{ __('Konfirmasi Password') }}</label>
                                <div class="input-group mb-2">
                                    <i class="bi bi-key-fill fs-5 text-secondary input-group-text"></i>
                                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Konfirmasi password anda..">
                                </div>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary fw-semibold text-light w-100 mt-3" >
                            {{ __('Daftar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
