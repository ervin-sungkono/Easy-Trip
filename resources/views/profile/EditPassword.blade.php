@extends('layouts.app')

@section('page_title', 'Edit Password')

@section('background')
    style="background-image: url({{asset('images/background-img.png')}})""
@endsection

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="container d-flex align-items-center" style="min-height: 85vh;">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow rounded px-2 py-4">
                    <div class="card-body">
                        <div class="display-6 playfair text-center fw-semibold mb-3">{{ __('Edit Password') }}</div>
        {{-- @if($errors->any())
            {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
            @endif
            @if(Session::get('error') && Session::get('error') != null)
            <div style="color:red">{{ Session::get('error') }}</div>
            @php
            Session::put('error', null)
            @endphp
            @endif
            @if(Session::get('success') && Session::get('success') != null)
            <div style="color:green">{{ Session::get('success') }}</div>
            @php
            Session::put('success', null)
            @endphp
            @endif --}}

            <form method="POST" action="/passwordupdate">
                @csrf
                <div class="row mb-3">
                    <label for="password" class="form-label">{{ __('Password Lama') }}</label>
                    <div class="col col-form-label text-md-right d-flex">
                        <div class="input-group mb-2">
                            <i class="bi bi-key-fill fs-5 text-secondary input-group-text"></i>
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror"  name="current_password" placeholder="Password lama anda.." autofocus>
                            @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                    <label for="password" class="form-label">{{ __('Password Baru') }}</label>
                        <div class="input-group mb-2">
                            <i class="bi bi-key-fill fs-5 text-secondary input-group-text"></i>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="Password baru anda..">
                            @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label for="password" class="form-label">{{ __('Konfirmasi Password Baru') }}</label>
                        <div class="input-group mb-2">
                            <i class="bi bi-key-fill fs-5 text-secondary input-group-text"></i>
                            <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation" placeholder="Konfirmasi password baru..">
                            @error('new_password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary fw-semibold text-light w-100 mt-3">
                        {{ __('Save Update') }}
                    </button>
                    <a href="/profile" class="btn btn-primary fw-semibold text-white mt-md-3">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
