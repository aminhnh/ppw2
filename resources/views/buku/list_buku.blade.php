@extends('layouts.layout')

@section('content')
<div class="bg-gray-800 p-4 text-white">
    <h2 class="text-2xl font-semibold">Daftar Buku</h2>
</div>


<div class="flex flex-wrap px-6">
    @foreach($data_buku as $buku)
        <div class="w-64 mx-2 my-4">
            <a href="{{ route('buku.detail', ['id' => $buku->id]) }}">
                <div class="rounded overflow-hidden shadow-lg">
                    <img class="w-full h-70 object-cover" src="{{ asset($buku->filepath) }}" alt="Foto buku">
                    <div class="px-6 py-2 h-20"> 
                      <div class="font-bold text-xl mb-2 truncate">{{ $buku->judul }}</div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

@endsection

