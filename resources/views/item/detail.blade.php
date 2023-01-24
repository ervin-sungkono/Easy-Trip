@extends('layouts.app')

@section('title', 'EasyTrip | '.$item->name)

@section('content')
    <div class="modal fade" tabindex="-1" id="testimony-update-modal">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title fw-bold">{{$item->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="modal-form">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <div class="row row-cols-1 justify-content-end">
                        <div class="col mb-3">
                            <label for="text">Review</label>
                            <textarea class="form-control" name="update-review" id="update-review" rows="6" placeholder="Leave your review here..."></textarea>
                            @error('update-review')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="rating">Rating</label>
                            <select class="form-select" name="rating" id="update-rating">
                                <option value="1">⭐</option>
                                <option value="2">⭐⭐</option>
                                <option value="3">⭐⭐⭐</option>
                                <option value="4">⭐⭐⭐⭐</option>
                                <option value="5">⭐⭐⭐⭐⭐</option>
                            </select>
                            @error('rating')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary fw-bold text-white w-100">Update review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="testimony-modal">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title fw-bold">{{$item->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('testimony.create')}}" method="POST">
                    @csrf
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <div class="row row-cols-1 justify-content-end">
                        <div class="col mb-3">
                            <label for="text">Review</label>
                            <textarea class="form-control" name="review" id="review" rows="6" placeholder="Leave your review here..."></textarea>
                            @error('review')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="rating">Rating</label>
                            <select class="form-select" name="rating" id="rating">
                                <option value="" selected disabled>Select Rating</option>
                                <option value="1">⭐</option>
                                <option value="2">⭐⭐</option>
                                <option value="3">⭐⭐⭐</option>
                                <option value="4">⭐⭐⭐⭐</option>
                                <option value="5">⭐⭐⭐⭐⭐</option>
                            </select>
                            @error('rating')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary fw-bold text-white w-100">Submit review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-3">
            <a href="{{route('product.index')}}">< Kembali ke Pesan Tiket</a>
        </div>
        <div class="row row-cols-1 row-cols-md-2 justify-content-center align-items-start mb-4">
            <div class="col-md-6 mb-3">
                @if(file_exists(public_path().'\storage/'.$item->image))
                    <img src={{asset('storage/'.$item->image)}} alt="" class="w-100 rounded shadow-sm" style="aspect-ratio: 16 / 10; object-fit: cover;">
                @else
                    <img src={{$item->image}} alt="" class="w-100 rounded shadow-sm" style="aspect-ratio: 16 / 10; object-fit: cover;">
                @endif
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-column mb-4">
                    <div class="display-6 playfair fw-bold mb-3">{{$item->name}}</div>
                    <p class="text-muted">{!! $item->description !!}</p>
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
                            @if((Auth::check() && Auth::user()->role === 'member') || !Auth::check())
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
                            @endif
                        </div>
                    </div>
                </div>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <div class="d-flex gap-3">
                        <a href="{{route('product.edit',['id' => $item->id])}}" class="btn btn-primary fw-bold text-white flex-grow-1">Ubah Item</a>
                        <form action="{{route('product.delete', ['id' => $item->id])}}" class="flex-grow-1" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger fw-bold text-white w-100">
                                Hapus Item
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-between align-items-center">
                <div class="display-6 playfair fw-bold mb-3">Reviews</div>
                @if(Auth::check() && Auth::user()->role === 'member')
                    <button class="btn btn-primary text-white fw-semibold" data-bs-toggle="modal" data-bs-target="#testimony-modal">
                        <span>Add Review</span>
                        <i class="bi bi-plus-lg"></i>
                    </button>
                @endif
            </div>
            <div class="d-flex flex-row flex-nowrap gap-3 py-3" style="overflow-x: scroll">
                @if($item->testimonies->count() > 0)
                    @foreach ($item->testimonies as $testimony)
                        @include('components.testimony-card', array(
                            'testimony' => $testimony,
                            'user' => $testimony->user
                        ))
                    @endforeach
                @elseif(Auth::check() && Auth::user()->role === 'member')
                    <div class="card" style="width: 16rem; min-width: 16rem;">
                        <div class="card-body">
                            <h4 class="card-title text-muted fw-bold">Belum ada review</h4>
                            <p class="card-text text-muted">jadilah yang pertama untuk membuat review!</p>
                            <button class="btn btn-primary text-white fw-semibold" data-bs-toggle="modal" data-bs-target="#testimony-modal">
                                <span>Add Review</span>
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const config = {
            languange : 'id',
            toolbar : [
                {name: 'basicstyles', items: ['Bold','Italic','Underline','Strike','-','RemoveFormat']}
            ],
            resize_enabled: false,
            height: 150
        }
        CKEDITOR.replace('review', config)
        CKEDITOR.replace('update-review', config)

        $(document).ready(function(){
            $('a.testimony-btn').click(function(e){
                $('#modal-form').attr('action', $(this).attr('data-route-name'))
                CKEDITOR.instances['update-review'].setData($(this).attr('data-review'))
                $('#update-rating').val($(this).attr('data-rating')).change()
            })
        })
    </script>
@endsection
