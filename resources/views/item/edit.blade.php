@extends('layouts.app')

@section('title', 'EasyTrip | Ubah Produk')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="display-6 playfair fw-bold text-center mb-5">{{ __('Ubah Produk') }}</div>
                        <form method="POST" action="{{ route('product.update',['id' => $item->id]) }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="form-label">{{ __('Nama Tempat Wisata') }}</label>
                                <div class="col">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$item->name}}" placeholder="Terdiri dari 5-30 karakter" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="location" class="form-label">{{ __('Lokasi Tempat Wisata') }}</label>
                                <div class="col">
                                    <input id="location" type="text" class="form-control @error('name') is-invalid @enderror" name="location" value="{{$item->location}}" placeholder="ex: Jakarta, Bali, Yogyakarta">
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="form-label">{{ __('Harga Tiket (IDR)') }}</label>
                                <div class="col">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$item->price}}" placeholder="ex: 100000">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="form-label">{{ __('Deskripsi Tempat Wisata') }}</label>
                                <div class="col">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" style="resize: none" name="description" rows="6">{{$item->description}}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="status">{{ __('Status Tempat Wisata') }}</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="status" name="status" {{$item->status ? "checked" : ""}}>
                                        <label class="form-check-label" for="status">Tersedia</label>
                                      </div>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label for="image" class="form-label text-center">{{ __('Gambar Tempat') }}</label>
                                <div class="col-md-6 mb-3">
                                    @if(file_exists(public_path().'\storage/'.$item->image))
                                        <img src="{{asset('storage/'.$item->image)}}" onerror="this.src='{{asset('images/preview-img.png')}}'"class="bg-dark rounded shadow-m mb-3 w-100" id="preview-img" style="object-fit: cover; aspect-ratio: 16 / 10; cursor: pointer;" onclick="openFile()">
                                    @else
                                        <img src="{{$item->image}}" onerror="this.src='{{asset('images/preview-img.png')}}'"class="bg-dark rounded shadow-m mb-3 w-100" id="preview-img" style="object-fit: cover; aspect-ratio: 16 / 10; cursor: pointer;" onclick="openFile()">
                                    @endif

                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" onchange="preview()">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <button type="submit" class="btn btn-secondary text-white fw-semibold col-md-6">
                                    {{ __('Ubah Produk') }}
                                </button>
                            </div>
                        </form>
                        @if (session('status'))
                            <div class="alert alert-primary mt-4">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const config = {
            languange : 'id',
            toolbar : [
                {name: 'basicstyles', items: ['Bold','Italic','Underline','Strike','-','RemoveFormat']}
            ],
            resize_enabled: false,
            height: 150
        }
        CKEDITOR.replace('description', config)

        function preview() {
            const url = URL.createObjectURL(event.target.files[0]);
            document.getElementById('preview-img').src = url;
        }
        function openFile() {
            document.getElementById('image').click();
        }
    </script>
@endsection
