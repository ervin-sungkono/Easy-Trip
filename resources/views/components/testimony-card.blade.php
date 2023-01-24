<div class="card" style="min-width: 16rem; max-width: 18rem;">
    <div class="card-body">
        <h4 class="card-title fw-semibold">{{$user->name}}</h4>
        <div class="d-flex mb-2">
            @for ($i = 0; $i < $testimony->rating; $i++)
                <i class="bi bi-star-fill text-warning"></i>
            @endfor
        </div>
        <p class="card-text">{!! $testimony->text !!}</p>
        @if(Auth::check() && Auth::user()->id === $user->id)
            <div class="d-flex align-items-center gap-2">
                <a class="btn btn-warning testimony-btn" href="#" data-route-name={{route('testimony.update', ['id' => $testimony->id])}} data-review="{{$testimony->text}}" data-rating="{{$testimony->rating}}" data-bs-toggle="modal" data-bs-target="#testimony-update-modal"><i class="bi bi-pencil-square"></i></a>
                <form action="{{route('testimony.delete', ['id' => $testimony->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-white" >
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </form>
            </div>
        @elseif (Auth::check() && Auth::user()->role === 'admin')
            <form action="{{route('testimony.delete', ['id' => $testimony->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger text-white" >
                    <i class="bi bi-trash-fill"></i>
                </button>
            </form>
        @endif
    </div>
</div>
