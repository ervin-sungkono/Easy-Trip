@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($tickets as $ticket)
        <div class="card">
            <div class="card-body">
                {{$ticket->item->name}}
                <a href="{{route('ticket.download', ['id'=>$ticket->ticket_id])}}">Download Here</a>
            </div>
        </div>
    @endforeach
</div>

@endsection
