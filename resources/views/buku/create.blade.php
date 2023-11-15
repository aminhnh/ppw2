@extends('layouts.layout')

@section('title', 'Add Book')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form enctype="multipart/form-data" action="{{route('buku.store')}}" method="post">
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
    <div>Thumbnail <br>
        <input type="file" name="thumbnail" id="thumbnail" alt="thumbnail">
    </div>
    <div>Galeri <br>
        <input multiple type="file" name="galeri[]" id="galeri" alt="galeri1"><br>
        <input multiple type="file" name="galeri[]" id="galeri" alt="galeri2">
    </div>
    <div><br><br>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a class="btn btn-danger" href="{{route('buku')}}">Batal</a>
    </div>
</form>

@endsection