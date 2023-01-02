<div class="card shadow bg-white h-100" style="max-width: 18rem">
    @if(file_exists(public_path().'\storage/'.$imageUrl))
        <img src="{{asset('storage/'.$imageUrl)}}" class="card-img-top" alt="{{$name}}">
    @else
        <img src="{{$imageUrl}}" class="card-img-top" alt="{{$name}}">
    @endif
    <div class="card-body d-flex flex-column">
        <h5 class="card-title fw-bold flex-grow-1">{{$name}}</h5>
        <div class="d-flex justify-content-between">
            <div class="d-flex gap-2">
                <i class="bi bi-geo-alt-fill"></i>
                <p>{{$location}}</p>
            </div>
            <div class="d-flex gap-2">
                <i class="bi bi-star-fill text-warning"></i>
                <p>{{$rating > 0 ? number_format($rating,2)."/5.00" : "No Ratings"}}</p>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-5 fw-bold">IDR {{number_format($price, 0, ',', '.')}}</p>
            <p class="{{$status ? 'text-success' : 'text-danger'}}">{{$status ? 'Tiket Tersedia' : 'Tiket Habis'}}</p>
        </div>
        <a href="{{route('product.detail', ['id' => $id])}}" class="btn btn-primary text-white fw-bold w-100">Lihat Detail</a>
    </div>
</div>
