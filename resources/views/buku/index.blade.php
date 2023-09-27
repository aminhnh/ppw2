@extends('layouts.layout')

@section('title', "Daftar Buku")

@section('content')
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
<h4>Jumlah Buku: {{ $jumlah_buku }}</h4>
<h4>Total Harga Buku: {{"Rp ".number_format($total_harga, 2, ',', '.') }}</h4>

<a href="{{route('buku.create')}}" class="btn btn-success">Tambah buku</a>

@endsection