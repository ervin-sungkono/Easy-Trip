@extends('layouts.app')

@section('title', 'EasyTrip | Histori')

@section('content')
    <div class="container" style="min-height: 85vh">
        <div class="display-6 playfair fw-bold text-center mb-3">
            Histori Transaksi
        </div>
        <div class="row row-cols-1 row-cols-md-2 justify-content-center">
            @if($transactions->count() > 0)
                @foreach ($transactions as $transaction)
                    <div class="col-md-6">
                        @include('components.transaction-card', array(
                            'transaction' => $transaction,
                            'transaction_details' => $transaction->details
                        ))
                    </div>
                @endforeach
            @else
                <h5 class="text-muted text-center">Belum ada histori transaksi.</h5>
            @endif
        </div>

    </div>
@endsection
