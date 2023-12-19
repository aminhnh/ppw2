@extends('layouts.layout')

@section('content')
<div class="bg-gray-800 p-4 text-white">
    <h2 class="text-2xl font-semibold">Daftar Buku Populer</h2>
</div>


<div class="flex flex-wrap px-6">
@if($data_buku->isEmpty())
    <p>No top rated books available.</p>
@else
<table class="min-w-full table-auto">
    <thead >
        <tr>
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">Thumbnail</th>
            <th class="px-4 py-2">Judul Buku</th>
            <th class="px-4 py-2">Penulis</th>
            <th class="px-4 py-2">Harga</th>
            <th class="px-4 py-2">Tanggal Terbit</th>
            <th class="px-4 py-2">Rating</th>
        </tr>
    </thead>
    <tbody class="text-left bg-white divide-y divide-gray-200">
        @foreach($data_buku as $index => $buku)
        <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}" onclick="window.location='{{ route('buku.detail', ['id' => $buku->id]) }}';" style="cursor: pointer;">                <td class="text-center">{{ $buku->id }}</td>
                <td class="px-4 py-2">
                    @if($buku->filepath)
                    <div class="px-8 py-8">
                        <img src="{{ asset($buku->filepath) }}" 
                        class=""
                        alt="image">
                    </div>
                    @endif
                </td>
                <td class="px-4 py-2">{{ $buku->judul }}</td>
                <td class="px-4 py-2">{{ $buku->penulis }}</td>
                <td class="px-4 py-2">{{ "Rp ".number_format($buku->harga, 2, ',', '.') }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y')}}</td>
                <td class="px-4 py-2">
                    @if($buku->ratings->isNotEmpty())
                        {{ number_format($buku->ratings->avg('value'), 2) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endif
</div>

@endsection

