@extends('layouts.layout')

@section('title', 'Edit Book')

@section('content')

@if(count($data_buku))
    <div class="alert alert-success">Ditemukan <strong> {{count($data_buku)}} </strong> data dengan kata: <strong>{{$cari}}</strong>
    </div>

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

@else
    <div class="alert alert-warning"> <h4> Data {{$cari}} tidak ditemukan </h4>
    <a href="/buku" class="btn btn-warning">Kembali</a></div>
@endif


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
