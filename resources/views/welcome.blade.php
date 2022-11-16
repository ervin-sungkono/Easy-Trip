@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.product-card', array(
            'id' => 1,
            'name' => 'Hutan Pinus Pengger',
            'location' => 'Yogyakarta',
            'rating' => 4.8,
            'price' => 5000,
            'imageUrl' => 'images/desert.jpg',
            'status' => true,
        ))
    </div>
@endsection
