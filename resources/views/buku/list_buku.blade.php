@extends('layouts.layout')

@section('content')
    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     -->

@foreach($data_buku as $buku)

<div class="max-w-xs rounded overflow-hidden shadow-lg">
    <a href="{{ route('buku.detail', ['id' => $buku->id]) }}">
  <img class="w-full" src="{{ asset($buku->filepath) }}" alt="Foto buku">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{ $buku->judul }}</div>
  </div>
</a>
</div>

<!-- <a href="{{ route('buku.detail', ['id' => $buku->id]) }}" class="max-w-xs rounded overflow-hidden shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:scale-105">
  <img class="w-full" src="{{ asset($buku->filepath) }}" alt="Foto buku">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{ $buku->judul }}</div>
  </div>
</a> -->


<br><br>
@endforeach
<!-- 
                </div>
            </div>
        </div>
    </div> -->

@endsection