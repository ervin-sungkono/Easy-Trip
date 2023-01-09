@extends('layouts.app')

@section('title', 'EasyTrip | '.$cart->item->name)

@section('content')
    <div class="container">
        <div class="row mb-3">
            <a href="{{route('product.index')}}">< Kembali ke Pesan Tiket</a>
        </div>
        <div class="row row-cols-1 row-cols-md-2 justify-content-center align-items-start mb-4">
            <div class="col-md-6 mb-3">
                @if(file_exists(public_path().'\storage/'.$cart->item->image))
                    <img src={{asset('storage/'.$cart->item->image)}} alt="" class="w-100 rounded shadow-sm" style="aspect-ratio: 16 / 10; object-fit: cover;">
                @else
                    <img src={{$cart->item->image}} alt="" class="w-100 rounded shadow-sm" style="aspect-ratio: 16 / 10; object-fit: cover;">
                @endif
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-column mb-4">
                    <div class="display-6 playfair fw-bold mb-3">{{$cart->item->name}}</div>
                    <p class="text-muted">{!! $cart->item->description !!}</p>
                    <div class="card py-2">
                        <div class="card-body d-flex justify-content-center gap-3">
                            <div class="d-flex gap-2">
                                <i class="bi bi-geo-alt-fill text-primary"></i>
                                <span>{{$cart->item->location}}</span>
                            </div>
                            <div class="vr"></div>
                            <div class="d-flex gap-2">
                                <i class="bi bi-people-fill text-primary"></i>
                                <span>{{$cart->item->testimonies->count()}} Reviews</span>
                            </div>
                            <div class="vr"></div>
                            <div class="d-flex flex-column-md gap-2">
                                <i class="bi bi-star-fill text-primary"></i>
                                <span>{{$cart->item->avg_rating > 0 ? number_format($cart->item->avg_rating,2)."/5.00" : "No Ratings"}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column mb-4">
                    <div class="display-6 playfair fw-bold mb-3">Harga Tiket</div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="d-flex">
                                    <h4 class="fw-semibold">IDR {{number_format($cart->item->price,0,',','.')}}</h4>
                                    <span class="text-muted">/Orang</span>
                                </div>
                                <p class="{{$cart->item->status ? 'text-success' : 'text-danger'}} mb-0">{{$cart->item->status ? 'Tiket Tersedia' : 'Tiket Habis'}}</p>
                            </div>
                            <form action="{{route('cart.update', ['id' => $cart->id])}}" method="POST" class="row mb-3">
                                @method('PUT')
                                @csrf
                                <div class="col-md-6 mb-3">
                                    <label for="ticket-date" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control @error('ticket_date') is-invalid @enderror" id="ticket-date" name="ticket_date" value={{$cart->ticket_date}}>
                                    @error('ticket_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="form-label">Jumlah Orang</label>
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="ex: 1" min="0" value="{{$cart->quantity}}">
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn py-2 btn-primary text-white fw-semibold w-100">
                                        Ubah Pesanan
                                    </button>
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
