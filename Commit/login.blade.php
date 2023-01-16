@extends('layouts.app')

@section('title', 'Easytrip | Masuk')

@section('background')
    style="background-image: url({{asset('images/background-img.png')}})""
@endsection

@section('content')
<div class="container d-flex align-items-center" style=" width: 50rem; height:36rem; p-5">
    <div class="row justify-content-center w-100">
        <div class="col-md-8">
            <div class="card " >
                    <div class="align-items-center justify-content-center mx-auto">
                        <h3 class=" text-center  fs-2 fw-bold ">{{ __('Masuk Halaman') }}</h3>
                    </div>
                     
            
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        
                        <label for="email" class="col col-form-label text-md-right d-flex " >{{ __('E-Mail') }} </label>
                       
                        <div class="row mb-2 "> 
                            

                            <div class="col-md-12 form outline mb-1 ">
                                <div class="input-group flex-nowrap mt-2">
                                <i class="bi bi-envelope-fill fs-5 text-secondary input-group-text"></i>
                                 
                                @error('email')
                                    <span class="invalid-feedback " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                                
                                
                            </div>
                                </div>
                                
                        </div>
                        
                        <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>
                        <div class="row mb-3">
                            

                            <div class="col-md-12">
                            <div class="input-group flex-nowrap mt-2">
                            <i class="bi bi-key-fill fs-5 text-secondary input-group-text"></i>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                               
                            </div>
                            </div>
                        </div>
                        
               
                            <div class=" row mb-8  ">
                                <button type="submit" class="btn btn-secondary fw-semibold text-light" >
                                    {{ __('Login') }}
                                </button>

                            </div>
                        <hr class="width:100 px;">
                       
                        
                    </form>
                    <div class=" row mb-7" >

                        <a href="{{ url('/login/google') }}">
                        <button class="btn btn-secondary fw-semibold text-light " style="background-color: #30D5C8;" >
                        <span class="text-light">Login With Google</span>
                        </a>


                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
