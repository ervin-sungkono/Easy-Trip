@extends('layouts.app')

@section('title', 'Easytrip | Edit Profile')

@section('background')
    style="background-image: url({{asset('images/background-img.png')}})""
@endsection

@section('content')
<div class="container d-flex align-items-center" style="min-height: 85vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded px-2 py-4">
                <div class="card-body">
                    <div class="display-6 playfair text-center fw-semibold mb-3">{{ __('Edit Profile') }}</div>

                    <form method="POST" action="/profileupdate">
                        @csrf
                        <div class="row mb-3 ">
                            <label for="name" class="col col-form-label text-md-right d-flex " >{{ __('Full Name') }} </label>
                            <div class="input-group mb-2">
                                <i class="bi bi-pencil-fill fs-5 text-secondary input-group-text"></i>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id ="name" name="name" value="{{Auth::user()->name}}" placeholder="Nama anda.." autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 ">
                            <label for="email" class="col col-form-label text-md-right d-flex " >{{ __('E-Mail') }} </label>
                            <div class="input-group mb-2">
                                <i class="bi bi-envelope-fill fs-5 text-secondary input-group-text"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    </div>
</div>
@endsection


