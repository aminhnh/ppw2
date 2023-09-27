@extends('layouts.layout')

@section('title', 'Add Book')

@section('content')
<form action="{{route('buku.store')}}" method="post">
    @csrf
    <div>Judul<br>
        <input type="text" name="judul" id="judul">
    </div>
    <div>Penulis<br>
        <input type="text" name="penulis" id="penulis">
    </div>
    <div>Harga<br>
        <input type="number" name="harga" id="harga">
    </div>
    <div>Tanggal Diterbitkan<br>
        <input type="date" name="tgl_terbit" id="tgl_terbit">
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a class="btn btn-danger" href="{{route('buku')}}">Batal</a>
    </div>
</form>

@endsection