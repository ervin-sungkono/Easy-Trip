@extends('layouts.app')
@section('title', 'EasyTrip | Profile')

@section('content')
    <div class="container" style="min-height: 85vh">
        <div class="row justify-content-center w-100">
            <div class="col-md-12">
                <div class="display-6 playfair fw-bold text-center mb-3">
                    My Profile
                </div>
            </div>
            <div class="card col-md-6 text-center shadow-sm rounded">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">
                        {{Auth::user()->name}}
                    </h5>
                    <p class="card-text d-flex justify-content-center align-items-center"><i class="bi bi-envelope-fill text-primary fs-5 me-2"></i><span>{{Auth::user()->email}}</span></p>
                    @if(Auth::user()->socialAccounts->count() > 0)
                        @foreach (Auth::user()->socialAccounts as $social)
                            <p class="card-text"><i class="bi bi-{{$social->provider}} text-primary me-2"></i><span>Signed in with {{$social->provider}}</span></p>
                        @endforeach
                    @endif
                    @if (Auth::user()->role === 'member')
                        <a class="btn btn-primary fw-semibold text-white" href="/editprofile">Edit Profile</a>
                    @endif
                    <a class="ms-3 btn btn-outline-primary fw-semibold" href="/changepassword">Edit Password</a>
                </div>
            </div>
        </div>
    </div>
@endsection


