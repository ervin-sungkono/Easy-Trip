@extends('layouts.app')

@section('title', 'EasyTrip | '.$item->name)

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 justify-content-center mb-4">
            <div class="col-md-6 mb-3">
                <img src={{$item->image}} alt="" class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-column mb-4">
                    <div class="display-6 playfair fw-bold mb-3">{{$item->name}}</div>
                    <p class="text-muted">{{$item->description}}</p>
                    <div class="card py-2">
                        <div class="card-body d-flex justify-content-center gap-3">
                            <div class="d-flex gap-2">
                                <i class="bi bi-geo-alt-fill text-primary"></i>
                                <span>{{$item->location}}</span>
                            </div>
                            <div class="vr"></div>
                            <div class="d-flex gap-2">
                                <i class="bi bi-people-fill text-primary"></i>
                                <span>{{$item->testimonies->count()}} Reviews</span>
                            </div>
                            <div class="vr"></div>
                            <div class="d-flex flex-column-md gap-2">
                                <i class="bi bi-star-fill text-primary"></i>
                                <span>{{$item->avg_rating > 0 ? number_format($item->avg_rating,2)."/5.00" : "No Ratings"}}</span>
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
                                    <h4 class="fw-semibold">IDR {{number_format($item->price,0,',','.')}}</h4>
                                    <span class="text-muted">/Orang</span>
                                </div>
                                <p class="{{$item->status ? 'text-success' : 'text-danger'}} mb-0">{{$item->status ? 'Tiket Tersedia' : 'Tiket Habis'}}</p>
                            </div>
                            <form action="{{route('cart.create')}}" method="POST" class="row mb-3">
                                @csrf
                                <input type="hidden" value="{{ $item->status }}" name="status">
                                <input type="hidden" value="{{ $item->id }}" name="item_id">
                                <div class="col-md-6 mb-3">
                                    <label for="ticket-date" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control @error('ticket_date') is-invalid @enderror" id="ticket-date" name="ticket_date" value={{now()}}>
                                    @error('ticket_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="form-label">Jumlah Orang</label>
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="ex: 1" min="0" value="{{old('quantity')}}">
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn py-2 btn-primary text-white fw-semibold w-100 d-flex justify-content-center align-items-center gap-2 mb-3 @if($item->status == false)disabled @endif">
                                        <span>Beli Tiket</span>
                                        <i class="bi bi-ticket-fill fs-5"></i>
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
        <div class="row">
            <div class="d-flex justify-content-between align-items-center">
                <div class="display-6 playfair fw-bold mb-3">Reviews</div>
                <div class="btn btn-primary text-white fw-semibold">
                    <span>Add Review</span>
                    <i class="bi bi-plus-lg"></i>
                </div>
            </div>
            <div class="d-flex flex-row flex-nowrap gap-3 py-3" style="overflow-x: scroll">
                @if($item->testimonies->count() > 0)
                    @foreach ($item->testimonies as $testimony)
                        @include('components.testimony-card', array(
                            'name' => $testimony->user->name,
                            'rating' => $testimony->rating,
                            'text' => $testimony->text
                        ))
                    @endforeach
                @else
                    <div class="card" style="width: 16rem; min-width: 16rem;">
                        <div class="card-body">
                            <h4 class="card-title text-muted fw-bold">No reviews yet</h4>
                            <p class="card-text text-muted">be the first one to make a review!</p>
                            <div class="btn btn-primary text-white fw-semibold">
                                <span>Add Review</span>
                                <i class="bi bi-plus-lg"></i>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
