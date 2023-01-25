<div class="card shadow bg-white mb-3" style="width: 18rem;">
    @if(file_exists(public_path().'\storage/'.$item->image))
        <img src="{{asset('storage/'.$item->image)}}" class="card-img-top" alt="{{$item->name}}" style="aspect-ratio: 16 / 10; object-fit: cover">
    @else
        <img src="{{$item->image}}" class="card-img-top" alt="{{$item->name}}" style="aspect-ratio: 16 / 10; object-fit: cover">
    @endif
    <div class="card-body d-flex flex-column">
        <h5 class="card-title fw-bold flex-grow-1">{{$item->name}}</h5>
        <div class="d-flex justify-content-between">
            <div class="d-flex gap-2">
                <i class="bi bi-geo-alt-fill"></i>
                <p>{{$item->location}}</p>
            </div>
            <div class="d-flex gap-2">
                <i class="bi bi-star-fill text-warning"></i>
                <p>{{$item->avg_rating > 0 ? number_format($item->avg_rating,2)."/5.00" : "No Ratings"}}</p>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-5 fw-bold">IDR {{number_format($item->price, 0, ',', '.')}}</p>
            <p class="{{$item->status ? 'text-success' : 'text-danger'}}">{{$item->status ? 'Tiket Tersedia' : 'Tiket Habis'}}</p>
        </div>
        <a href="{{route('product.detail', ['id' => $item->id])}}" class="btn btn-primary text-white fw-bold w-100">Lihat Detail</a>
    </div>
</div>
