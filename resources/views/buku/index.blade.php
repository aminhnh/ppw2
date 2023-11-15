@extends('layouts.layout')

@section('title', "Daftar Buku")

@section('content')
<div class="flash-message">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>

<form action="{{route('buku.search')}}" method="get">
    @csrf
    <input type="text" name="kata" class="form-control" placeholder="Cari . . ." style="width:30%; display: inline; margin-top: 10px; margin-bottom: 10px; float: right;" >
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Thumbnail</th>
            <th>ID</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_buku as $buku)

        
            <tr>   
                <td>
                @if($buku->filepath)
                <div class="relative h-10 w-10">
                    <img src="{{ asset($buku->filepath) }}" 
                    class="h-full w-full rounded-full object-cover object-center"
                    alt="image">
                </div>
                @endif
                </td>
                <td>{{ $buku->id }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y')}}</td>
                <td>
                <form action="{{ route('buku.edit', $buku->id) }}" method="post">
                    @csrf 
                    <button class="btn btn-primary">
                        Edit
                    </button>
                </form>
                </td>
                <td>
                <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                    @csrf 
                    <button onclick="return confirm('Hapus buku {{$buku->judul}} ?')" 
                            class="btn btn-danger">
                        Hapus
                    </button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $data_buku->links() }}

<h4>Jumlah Buku: {{ $jumlah_buku }}</h4>
<h4>Total Harga Buku: {{"Rp ".number_format($total_harga, 2, ',', '.') }}</h4>

<a href="{{route('buku.create')}}" class="btn btn-success">Tambah buku</a>

<script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Get the flash message div by its ID
        var flashMessage = document.getElementById("flash-message");
        
        // Check if the flash message element exists
        if (flashMessage) {
            // Set a timeout to hide the div after, for example, 5 seconds (5000 milliseconds)
            setTimeout(function() {
                flashMessage.style.display = "none"; // Hide the div
            }, 3000); // Adjust the timeout value as needed (5 seconds in this example)
        }
    });
</script>


@endsection