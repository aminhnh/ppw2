@extends('layouts.layout')

@section('title', 'Edit Book')

@section('content')
<form action="{{route('buku.update', $buku->id)}}" method="post">
    @csrf
    <div>Judul<br>
        <input type="text" name="judul" id="judul" value="{{$buku->judul}}">
    </div>
    <div>Penulis<br>
        <input type="text" name="penulis" id="penulis" value="{{$buku->penulis}}">
    </div>
    <div>Harga<br>
        <input type="number" name="harga" id="harga" value="{{$buku->harga}}">
    </div>
    <div>Tanggal Diterbitkan<br>
        <input type="date" name="tgl_terbit" id="tgl_terbit" value="{{$buku->tgl_terbit}}">
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a class="btn btn-danger" href="{{route('buku')}}">Batal</a>
    </div>
</form>

@endsection

