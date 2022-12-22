@extends('layouts.app')

@section('content')
    <div class="container min-vh-100 d-flex align-items-center">
        <div class="row row-cols-1 row-cols-sm-2">
            <div class="col col-md-7">
                <h1 class="display-3 fw-bold mb-3">Melayani <span class="text-primary">kebutuhan perjalanan</span> anda.</h1>
                <p class="fs-5 mb-4">Lebih dari 500 pilihan destinasi di seluruh Indonesia.</p>
                <div class="row row-cols-1 row-cols-md-2 px-3 gap-3">
                    <a href="#pesantiket" class="col col-md-5 btn btn-secondary btn-lg fw-semibold text-light">
                        {{__('Pesan Tiket')}}
                    </a>
                    <a href="{{route('register')}}" class="col col-md-5 btn btn-outline-secondary btn-lg fw-semibold">
                        {{__('Daftar Akun')}}
                    </a>
                </div>
            </div>
            <form action="#" class="form col col-md-5 shadow rounded p-4">
                <div class="row mb-3">
                    <label for="location" class="fw-semibold">Destinasi</label>
                    <div class="input-group flex-nowrap mt-2">
                        <i class="bi bi-geo-alt-fill fs-5 text-secondary input-group-text" id="addon-wrapping"></i>
                        <input type="text" class="form-control" placeholder="Destinasi (ex: Jakarta, Bandung, dst)" name="location" id="location" aria-describedby="addon-wrapping" value={{old('location')}}>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <label for="trip-date" class="fw-semibold">Tanggal</label>
                        <div class="input-group flex-nowrap mt-2">
                            <i class="bi bi-calendar-event-fill fs-5 text-secondary input-group-text" id="addon-wrapping"></i>
                            <input type="date" class="form-control" name="trip_date" id="trip-date" aria-describedby="addon-wrapping" value={{now()}}>
                        </div>
                    </div>
                    <div class="col">
                        <label for="person" class="fw-semibold">Jumlah Orang</label>
                        <div class="input-group flex-nowrap mt-2">
                            <i class="bi bi-person-fill fs-5 text-secondary input-group-text" id="addon-wrapping"></i>
                            <input type="text" class="form-control" placeholder="Jumlah Orang" name="person" id="person" aria-describedby="addon-wrapping" value={{old('person')}}>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg fw-semibold text-light w-100">Cari</button>
            </form>
        </div>
    </div>
@endsection
