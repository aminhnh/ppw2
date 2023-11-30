<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buku Favoritku') }}
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


@if($jumlah_buku > 0)

<table class="min-w-full">
    <thead >
        <tr>
            <th>ID</th>
            <th>Thumbnail</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
        </tr>
    </thead>
    <tbody class="text-left bg-white divide-y divide-gray-200">
        @foreach($data_buku_fav as $index => $fav)
        <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}" onclick="window.location='{{ route('buku.detail', ['id' => $fav->buku->id]) }}';" style="cursor: pointer;">
            <td class="text-center">{{ $fav->buku->id }}</td>
            <td>
                @if($fav->buku->filepath)
                <div class="px-8 py-8">
                    <img src="{{ asset($fav->buku->filepath) }}" 
                    class=""
                    alt="image">
                </div>
                @endif
            </td>
            <td>{{ $fav->buku->judul }}</td>
            <td>{{ $fav->buku->penulis }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $data_buku_fav->links() }}

<h4>Jumlah Buku: {{ $jumlah_buku }}</h4>

@else 

<p>
    Belum ada buku yang di favorit!
</p>

@endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
