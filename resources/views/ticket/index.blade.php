@extends('layouts.app')

@section('content')

<div class="container min-vh-100">
    <div class="row ">
        @foreach ($tickets as $ticket)
            <div class="col-md-6 mb-5">
                @include('components.ticket-card',array(
                    'ticket_id' => $ticket->ticket_id,
                    'product_image' => $ticket->item->image,
                    'product_title' => $ticket->item->name,
                    'quantity' => $ticket->quantity,
                    'ticket_date' => $ticket->ticket_date,
                    'status' => $ticket->status
                ))
            </div>
        @endforeach
    </div>

</div>

@endsection
