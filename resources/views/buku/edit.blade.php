@extends('layouts.layout')

@section('title', 'Edit Book')

@section('content')
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



<form   enctype="multipart/form-data" 
        action="{{route('buku.update', $buku->id)}}" 
        method="post">
    @csrf
    @method('POST')
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
    <div>Thumbnail <br>
    <input type="file" name="thumbnail" id="thumbnail" alt="thumbnail">
        <div>
            @if($buku->filepath)
            <img src="{{ asset($buku->filepath) }}" 
            class="rounded-full object-cover object-center"
            alt="gambar thumbnail"
            width="200"
            >
            @endif
        </div>
    </div>
    <div>Galeri <br>
        <input type="file" name="galeri[]" id="galeri" alt="galeri1" multiple><br>
        <input type="file" name="galeri[]" id="galeri" alt="galeri2" multiple>
    </div><br><br>
    
    <div class="gallery-items ">
        @foreach($buku->galleries()->get() as $galeri)
        <div class="gallery-item">
            <img src="{{ asset($galeri->path) }}" 
            class="object-cover object-center"
            alt="galeri"
            width="200"
            >
            <br>
            <button onclick="deleteGaleri({{ $galeri->id }})" class="btn btn-danger">Delete</button>
            <!-- <form action="{{ route('buku.destroy-galeri', $galeri->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Are you sure you want to delete this gallery item?')"
                        class="btn btn-danger">Delete</button>
            </form> -->
        </div>
        <br>
        @endforeach
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a class="btn btn-danger" href="{{route('buku')}}">Batal</a>
    </div>
</form>

<script>
    function deleteGaleri(galeriId) {
        if (confirm('Are you sure you want to delete this gallery item?')) {
            // Use AJAX to send a DELETE request
            fetch(`/buku/galeri/delete/${galeriId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                // Optionally handle the success response
                return response.json(); // or response.text() depending on your API response
            })
            .then(data => {
                // Optionally handle the success data
                console.log(data);
                // Refresh the page or update the UI as needed
                location.reload();
            })
            .catch(error => {
                // Handle errors
                console.error('There was a problem with the fetch operation:', error);
            });
        }
    }
</script>
@endsection

