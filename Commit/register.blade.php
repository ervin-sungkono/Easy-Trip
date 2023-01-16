@extends('layouts.app')

@section('title', 'Easytrip | Daftar')

@section('background')
    style="background-image: url({{asset('images/background-img.png')}})""
@endsection

@section('content')
<div class="container d-flex align-items-center" style=" width: 50rem; height:36rem; p-5">
    <div class="row justify-content-center w-100">
        <div class="col-md-10">
            <div class="card " >
                    <div class="align-items-center justify-content-center">
                        <h3 class=" text-center fs-2 fw-bold playfair" >{{ __('Buat Akun') }}</h3>
                    </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <label for="name" class="col-md-4 col-form-label text-md-end d-flex"  rows="5">{{ __('Name') }}</label>
                        <div class="row mb-2 form-outline mb-4">
                           

                            <div class="col-md-12 form outline mb-1">
                            <div class="input-group flex-nowrap mt-2">
                            <i class="bi bi-pencil-fill fs-5 text-secondary input-group-text"></i>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                               
                            </div>
                            </div>
                        </div>
                        <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
                        <div class="row mb-3">
                            
                            <div class="col-md-12">
                            <div class="input-group flex-nowrap mt-2">
                                <i class="bi bi-envelope-fill fs-5 text-secondary input-group-text"></i>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                
                                
                            </div>
                            </div>
                        </div>

                        <label for="Nomor" class="col-md-4 col-form-label text-md-left">{{ __('Nomor HP') }}</label>

                        <div class="row mb-3">
                            
                       
                            <div class="col-md-12 mb-4">
                                <div class="input-group flex-nowrap mt-2">
                                <i class="bi bi-telephone-fill fs-5 text-secondary input-group-text"></i>
                                @error('Nomor')

                                    <span class="invalid-feedback  " role="alert">
                                        
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <input id="number" type="number" class="form-control @error('Nomor') is-invalid @enderror " name="Nomor"  required autocomplete="Nomor">
                                                                 

                             
                                
                            </div>

                        <div class="row mb-5">
                            
                       <div class="col">
                        
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                            <div class="input-group flex-nowrap mt-2">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <i class="bi bi-key-fill fs-5 text-secondary input-group-text"></i>
                               
                            </div>
                                                        @error('password')

                            <span class="invalid-feedback align-text-bottom " role="alert">
                            
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>

                        <div class="col">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm ') }}</label>

                            <div class="col-md-12">
                            <div class="input-group flex-nowrap mt-2">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <i class="bi bi-key-fill fs-5 text-secondary input-group-text"></i>
                            </div>
                        </div>
                        </div>
                        </div>
                        
                        <hr class="width:100 px;">
                        <div class="row mb-7 ">
                           
                                <button type="submit" class="btn btn-secondary fw-semibold text-light">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
