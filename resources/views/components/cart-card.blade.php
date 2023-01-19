<div class="card shadow-sm mb-3">
    <div class="row g-0">
      <div class="col-4" >
        @if(file_exists(public_path().'\storage/'.$item->image))
            <img src="{{asset('storage/'.$item->image)}}" class="img-fluid rounded-start" alt="..." style="aspect-ratio:1/1; object-fit: cover">
        @else
            <img src="{{$item->image}}" class="img-fluid rounded-start" alt="..." style="aspect-ratio:1/1; object-fit: cover">
        @endif
      </div>
      <div class="col-8">
        <div class="card-body d-flex flex-column h-100">
            <div class="card-title">
                <span class="fs-5 fw-semibold">{{$item->name}}</span>
                <span class="text-muted">| {{$cart->quantity}} Orang</span>
            </div>
            <p class="card-text flex-grow-1">{{$cart->ticket_date->format('j F Y')}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-text fw-semibold mb-0">IDR {{number_format($cart->total_price,0,',','.')}}</p>
                <div class="d-flex align-items-center gap-2">
                    <a class="btn btn-warning" href="{{route('cart.form', ['id' => $cart->id])}}"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{route('cart.delete', ['id' => $cart->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger text-white" >
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
