@extends('layouts.layout')

@section('content')

<section id="album" class="py-5 bg-light">
    <div class="container flex flex-col md:flex-row">
        <div class="md:w-1/2">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($buku->galleries()->get() as $galeri)
                    <div class="relative group">
                        <a href="{{ asset($galeri->path) }}" data-lightbox="image-gallery">
                            <img src="{{ asset($galeri->path) }}" alt="Gambar galeri buku" class="w-full h-65 object-cover rounded-md transition duration-300 transform group-hover:scale-105">
                        </a>
                        <div class="flex items-center justify-center">
                            <h5 class="text-black text-lg font-bold">{{ $galeri->nama_galeri }}</h5>
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
            </div>
            <hr class="my-4">
        </div>
    </div>
</section>



<section id="album" class="py-1 text-center bg-light">
<div class="container">
    <h2>{{ $buku->judul }}</h2>
    <h2>oleh {{$buku->penulis}}</h2>
    <hr>
    <div class="row">
        @foreach($buku->galleries()->get() as $galeri)
        <a href="{{ asset($galeri->path) }}"
        data-lightbox="image-1" >
            <img src="{{ asset($galeri->path) }}" alt="Gambar galeri buku" style="width:200px; height:150px">
        </a>
        <p><h5>{{ $galeri->nama_galeri }}</h5></p>
        @endforeach
    </div>
</div>
</section>
@endsection