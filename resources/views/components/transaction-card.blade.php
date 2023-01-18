<div class="card card-body shadow-sm rounded h-100 d-flex flex-column">
    <div class="d-flex justify-content-between">
        <p>Transaction ID: {{$transaction->id}}</p>
        <p>Tanggal: {{$transaction->created_at->format('d-m-Y')}}</p>
    </div>
    <h5 class="card-title fw-bold text-center mb-3">Detail Transaksi</h5>
    <div class="d-flex flex-column flex-grow-1">
        @foreach ($transaction_details as $td)
            <div class="d-flex justify-content-between">
                <div>{{$td->item->name}}</div>
                <div><span>{{$td->quantity}}</span>x<span>{{number_format($td->item->price,0,',','.')}}</span></div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="d-flex justify-content-between fw-semibold">
        <p>Total</p>
        <p>IDR {{number_format($transaction_details->sum('total_price'),0,',','.')}}</p>
    </div>
</div>
