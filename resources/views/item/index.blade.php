@extends('layouts.app')

@section('title', 'EasyTrip | Pesan Tiket')

@section('content')
<div class="container min-vh-100">
    <div class="row mb-3 d-flex flex-column align-items-center">
        <div class="display-6 playfair fw-bold mb-3 text-center">Jelajah berbagai tempat wisata.</div>
        <div class="col-md-6">
            <form action="{{route('product.index')}}" class="input-group shadow-sm" method="GET">
                <input type="text" class="form-control" placeholder="Cari tempat wisata.." name="q" value="{{$query}}">
                <button class="btn btn-secondary" type="submit">
                    <i class="bi bi-search text-white"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="row mb-3">
        <div class="d-flex flex-wrap justify-content-center gap-3 py-3">
            @foreach ($items as $item)
                @include('components.product-card', array(
                        'item' => $item,
                ))
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{$items->onEachSide(1)->withQueryString()->links()}}
        </div>
    </div>
</div>
@endsection
