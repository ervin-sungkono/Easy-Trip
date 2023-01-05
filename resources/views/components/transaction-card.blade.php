<div class="card card-body shadow-sm rounded">
    <div class="d-flex justify-content-between">
        <p>{{$transaction_id}}</p>
        <p>{{$transaction_date}}</p>
    </div>
    <h5 class="card-title fw-bold text-center">Detail Transaksi</h5>
    @foreach ($transaction_details as $td)
        <div class="d-flex justify-content-between">
            <div>{{$td->item->name}}</div>
            <div><span>{{$td->quantity}}</span>x<span>{{number_format($td->item->price,0,',','.')}}</span></div>
        </div>
    @endforeach
    <div class="d-flex justify-content-between fw-semibold">
        <p>Total</p>
        <p>IDR {{number_format($total_price,0,',','.')}}</p>
    </div>
</div>
