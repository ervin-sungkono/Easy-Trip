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
                <span class="text-muted">| {{$ticket->quantity}} Orang</span>
            </div>
            <p class="card-text flex-grow-1">{{$ticket->ticket_date->format('d-m-Y')}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <p>Status: <span class="@if($ticket->status)text-success @else text-danger @endif">{{$ticket->status?"Aktif":"Sudah Digunakan"}}</span></p>
                <a class="btn btn-primary fw-semibold text-white" href="{{route('ticket.download', ['id' => $ticket->ticket_id])}}"><i class="bi bi-download me-2"></i>Download</a>
            </div>
        </div>
      </div>
    </div>
</div>
