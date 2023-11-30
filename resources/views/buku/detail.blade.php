@extends('layouts.layout')

@section('content')

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif        

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


<section id="album" class="py-5 bg-light">
    <div class="container flex flex-col md:flex-row">
        <div class="md:w-1/2">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="relative group">
                        <a href="{{ asset($buku->filepath) }}" data-lightbox="image-gallery">
                            <img src="{{ asset($buku->filepath) }}" alt="Gambar galeri buku" class="w-full h-65 object-cover rounded-md transition duration-300 transform group-hover:scale-105">
                        </a>
                        <div class="flex items-center justify-center">
                            <!-- <h5 class="text-black text-lg font-bold">{{ $buku->filename }}</h5> -->
                        </div>
                    </div>
                @foreach($buku->galleries()->get() as $galeri)
                    <div class="relative group">
                        <a href="{{ asset($galeri->path) }}" data-lightbox="image-gallery">
                            <img src="{{ asset($galeri->path) }}" alt="Gambar galeri buku" class="w-full h-65 object-cover rounded-md transition duration-300 transform group-hover:scale-105">
                        </a>
                        <div class="flex items-center justify-center">
                            <!-- <h5 class="text-black text-lg font-bold">{{ $galeri->nama_galeri }}</h5> -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="md:w-1/2 pl-8">
            <div class="mb-4">
                <h2 class="text-3xl font-bold">{{ $buku->judul }}</h2>
                <p class="text-lg">oleh {{ $buku->penulis }}</p>
                <p class="text-lg">Harga: {{ $buku->harga }}</p>
                <p class="text-lg">Tanggal Terbit: {{ $buku->tgl_terbit }}</p>
                <p class="text-lg">
                    @if($buku_rating)
                        Rating: {{ $buku_rating }}
                    @else
                        Rating not available.
                    @endif
                </p>

            </div>
            <hr class="my-4">
            <form action="{{ route('buku.addfav', $buku->id) }}" method="post">
                        @csrf 
                        <button class="bg-yellow-500 text-white rounded-md py-1 px-4">
                            +Favourite
                        </button>
                    </form>
            <br><br>
            @if(auth()->check())
                <form action="{{ route('rate.book', $buku->id) }}" method="post">
                    @csrf
                    <label for="rating">Rate this book:</label><br>
                    <select name="rating" id="rating">
                        <option value="null" selected>Select</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                    <button type="submit" class="bg-blue-500 text-white rounded-md py-1 px-4">
                        Rate
                    </button>
                </form>

                <script>
                    document.getElementById('rating').options[0].disabled = true;
                </script>
            @else
                <p class="text-red-500">You must be logged in to rate this book.</p>
            @endif
        </div>
    </div>
</section>


@endsection