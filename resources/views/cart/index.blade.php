@extends('layouts.app')

@section('title', 'EasyTrip | Cek Order')

@section('content')
    <div class="container" style="min-height: 85vh">
        <div class="row">
            <div class="col-md-6 mb-5" style="overflow-y: scroll; max-height: 85vh">
                @foreach ($carts as $cart)
                    @include('components.cart-card',array(
                        'cart' => $cart,
                        'item' => $cart->item
                    ))
                @endforeach
            </div>
            <div class="col-md-6" style="overflow-y: scroll; max-height: 85vh;">
                @if($carts->count() > 0)
                    <div class="card card-body shadow rounded">
                        <div class="display-6 playfair fw-bold mb-3">Rincian Pembayaran</div>
                        <div class="row">
                            @foreach ($carts as $cart)
                                <div class="d-flex justify-content-between">
                                    <div>{{$cart->item->name}}</div>
                                    <div><span>{{$cart->quantity}}</span>x<span>{{number_format($cart->item->price,0,',','.')}}</span></div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="d-flex justify-content-between">
                                <h4 class="fw-semibold playfair">Subtotal</h4>
                                <span class="fw-semibold">IDR {{number_format($carts->sum('total_price'),0,',','.')}}</span>
                            </div>
                        </div>
                        <form action="{{route('transaction.create')}}" method="POST">
                            @csrf
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="1" id="terms_check" name="terms_check" required>
                                <label class="form-check-label" for="terms_check"> Saya setuju dengan syarat dan ketentuan</label>

                            </div>
                            <button type="submit" class="btn btn-secondary w-100 fw-semibold text-white">
                                <span class="me-2">Bayar</span>
                                <i class="bi bi-credit-card-fill"></i>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="fs-2 playfair fw-bold">
                        <span>Belum ada pesanan di keranjang, ayo pesan sekarang </span>
                        <a href="{{route('product.index')}}">disini.</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
