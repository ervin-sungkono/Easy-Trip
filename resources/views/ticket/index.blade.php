@extends('layouts.app')

@section('title', 'EasyTrip | Tiket Saya')

@section('content')
<div class="container min-vh-100">
    <div class="display-6 playfair fw-bold text-center mb-3">Tiket Anda</div>
    <div class="row ">
        @if($tickets->count() > 0)
            @foreach ($tickets as $ticket)
                <div class="col-md-6 mb-5">
                    @include('components.ticket-card',array(
                        'ticket' => $ticket,
                        'item' => $ticket->item
                    ))
                </div>
            @endforeach
        @else
            <p class="text-muted text-center fs-5">Belum ada tiket yang dipesan.</p>
        @endif
    </div>
</div>
@endsection
