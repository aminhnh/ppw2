<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Buku di Kategori ') }} {{$category->nama}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    

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
@if($data_buku->isEmpty())
    <p>No books found in this category.</p>
@else
<table class="min-w-full">
    <thead >
        <tr>
            <th>ID</th>
            <th>Thumbnail</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
        </tr>
    </thead>
    <tbody class="text-left bg-white divide-y divide-gray-200">
        @foreach($data_buku as $index => $buku)
        <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}" onclick="window.location='{{ route('buku.detail', ['id' => $buku->id]) }}';" style="cursor: pointer;">
                <td class="text-center">{{ $buku->id }}</td>
                <td>
                    @if($buku->filepath)
                    <div class="px-8 py-8">
                        <img src="{{ asset($buku->filepath) }}" 
                        class=""
                        alt="image">
                    </div>
                    @endif
                </td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y')}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
