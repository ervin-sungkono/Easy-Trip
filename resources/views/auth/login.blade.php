@extends('layouts.app')

@section('title', 'Easytrip | Masuk')

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
                        {{ __('Masuk Halaman') }}
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3 ">
                            <label for="email" class="col col-form-label text-md-right d-flex " >{{ __('E-Mail') }} </label>
                            <div class="input-group mb-2">
                                <i class="bi bi-envelope-fill fs-5 text-secondary input-group-text"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email anda..">
                                @error('email')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>
                            <div class="input-group mb-2">
                                <i class="bi bi-key-fill fs-5 text-secondary input-group-text"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password anda..">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary fw-semibold text-light w-100 mt-3" >
                            {{ __('Masuk') }}
                        </button>
                    </form>
                    <div class="d-flex align-items-center justify-content-center my-3">
                        <hr class="flex-grow-1">
                        <p class="text-muted px-3 mb-0">Atau</p>
                        <hr class="flex-grow-1">
                    </div>
                    <a href="{{route('provider.login', ['provider' => 'google'])}}" class="btn btn-outline-secondary fw-semibold w-100">
                        <i class="bi bi-google"></i>
                        <span>{{ __('Masuk dengan Google') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
