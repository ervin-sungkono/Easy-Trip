@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center" style="min-height: 85vh">
        <div class="row row-cols-1 row-cols-sm-2 w-100">
            <div class="col col-md-7">
                <h1 class="display-3 playfair fw-bold mb-3">Melayani <span class="text-primary">kebutuhan perjalanan</span> anda.</h1>
                <p class="fs-5 mb-4">Lebih dari 500 pilihan destinasi di seluruh Indonesia.</p>
                <div class="row row-cols-1 row-cols-md-2 px-3 gap-3">
                    <a href="{{route('product.index')}}" class="col col-md-4 btn btn-secondary btn-lg fw-semibold text-light">
                        {{__('Pesan Tiket')}}
                    </a>
                    @guest
                        <a href="{{route('register')}}" class="col col-md-4 btn btn-outline-secondary btn-lg fw-semibold">
                            {{__('Daftar Akun')}}
                        </a>
                    @else
                        <a href="{{route('cart.index')}}" class="col col-md-4 btn btn-outline-secondary btn-lg fw-semibold">
                            {{__('Cek Order')}}
                        </a>
                    @endguest

                </div>
            </div>
            <form action="{{route('product.index')}}" class="form col col-md-5 shadow rounded p-4" method="GET">
                <div class="row mb-3">
                    <label for="location" class="fw-semibold">Destinasi</label>
                    <div class="input-group flex-nowrap mt-2">
                        <i class="bi bi-geo-alt-fill fs-5 text-secondary input-group-text"></i>
                        <input type="text" class="form-control" placeholder="Destinasi (ex: Jakarta, Bandung, dst)" name="loc" id="location" value="{{old('location')}}" required>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <label for="trip-date" class="fw-semibold">Tanggal</label>
                        <div class="input-group flex-nowrap mt-2">
                            <i class="bi bi-calendar-event-fill fs-5 text-secondary input-group-text"></i>
                            <input type="date" class="form-control" name="trip_date" id="trip-date" value={{now()}}>
                        </div>
                    </div>
                    <div class="col">
                        <label for="quantity" class="fw-semibold">Jumlah Orang</label>
                        <div class="input-group flex-nowrap mt-2">
                            <i class="bi bi-person-fill fs-5 text-secondary input-group-text"></i>
                            <input type="number" class="form-control" placeholder="ex: 1" name="quantity" id="quantity" value={{old('quantity')}} min="1">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg fw-semibold text-light w-100">Cari</button>
            </form>
        </div>
    </div>
@endsection
