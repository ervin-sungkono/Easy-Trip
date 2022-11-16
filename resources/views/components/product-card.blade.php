<div class="card shadow bg-white" style="width: 16rem;">
    <img src="{{asset('storage/'.$imageUrl)}}" class="card-img-top" alt="..." style="aspect-ratio: 16 / 10; object-fit: cover">
    <div class="card-body">
        <h5 class="card-title fw-bold">{{$name}}</h5>
        <div class="d-flex justify-content-between">
            <div class="d-flex gap-2">
                <i class="bi bi-geo-alt-fill"></i>
                <p>{{$location}}</p>
            </div>
            <div class="d-flex gap-2">
                <i class="bi bi-star-fill text-warning"></i>
                <p>{{$rating}}/5.00</p>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <p class="fs-5 fw-bold">IDR {{number_format($price, 0, ',', '.')}}</p>
            <p class="{{$status ? 'text-success' : 'text-danger'}}">{{$status ? 'Tiket Tersedia' : 'Tiket Habis'}}</p>
        </div>
        <a href="#" class="btn w-100" style="background-color: #FF9F1C; color: white;">Lihat Detail</a>
    </div>
</div>
