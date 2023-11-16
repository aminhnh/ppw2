@extends('layouts.layout')

@section('content')
    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     -->

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


<!-- 
                </div>
            </div>
        </div>
    </div> -->

@endsection