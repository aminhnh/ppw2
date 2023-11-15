<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $data_buku = Buku::orderBy('id')->paginate(10);
        $jumlah_buku = Buku::count();
        $total_harga = Buku::sum('harga');

        return view('buku', compact('data_buku', 'jumlah_buku', 'total_harga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'penulis'=> 'required|string|max:30',
            'harga'=> 'required|numeric',
            'tgl_terbit'=> 'required|date',
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
        
            Image::make(storage_path().'/app/public/uploads/'.$fileName)->fit(240, 320)->save();

            $new_buku = Buku::create([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'harga' => $request->harga,
                'tgl_terbit' => $request->tgl_terbit,
                'filename' => $fileName,
                'filepath' => '/storage/' . $filePath
            ]);
        } else {
            $new_buku = Buku::create([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'harga' => $request->harga,
                'tgl_terbit' => $request->tgl_terbit,
            ]);
        }

        if($request->file('galeri')){
            foreach($request->file('galeri') as $key => $file){
                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                Galeri::create([
                    'nama_galeri' => $fileName,
                    'path' => '/storage/' . $filePath,
                    'foto' => $fileName,
                    'buku_id' => $new_buku->id
                ]);

            }
        }

        return redirect('/buku')->with('message', 'Buku berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'penulis'=> 'required|string|max:30',
            'harga'=> 'required|numeric',
            'tgl_terbit'=> 'required|date',
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048',
            'galeri' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('thumbnail')) {
            $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
        
            Image::make(storage_path().'/app/public/uploads/'.$fileName)->fit(240, 320)->save();
    
            $buku = Buku::find($id);
            $buku->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'harga' => $request->harga,
                'tgl_terbit' => $request->tgl_terbit,
                'filename' => $fileName,
                'filepath' => '/storage/' . $filePath
            ]);
        } else {
            $buku = Buku::find($id);
            $buku->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'harga' => $request->harga,
                'tgl_terbit' => $request->tgl_terbit,
            ]);
        }
        

        if($request->file('galeri')){
            foreach($request->file('galeri') as $key => $file){
                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                Galeri::create([
                    'nama_galeri' => $fileName,
                    'path' => '/storage/' . $filePath,
                    'foto' => $fileName,
                    'buku_id' => $id
                ]);

            }
        }

        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }

    public function search(Request $request)
    {
        $batas = 10;
        $cari = $request->kata;
        
        $data_buku = Buku::where('judul', 'LIKE','%'.$cari.'%')->orwhere('penulis', 'like', '%'.$cari.'%')->paginate($batas);
        $jumlah_buku = $data_buku->count();
        $no = $batas * ($data_buku->currentPage()-1);

        return view('buku.search', compact('jumlah_buku','data_buku','no','cari'));
    }

    public function destroyGaleri($id)
    {
        $galeri = Galeri::findOrFail($id);

        $buku_id = $galeri->buku_id;

        $galeri->delete();

        if ($galeri) {
            // Delete the Galeri model
            $galeri->delete();
        
            // Check if it has been deleted
            if (Galeri::find($id) === null) {
                // The Galeri model has been deleted successfully
                return redirect()->back()->with('success', 'Galeri item deleted successfully');
            } else {
                // The Galeri model was not deleted
                return redirect()->back()->with('error', 'Failed to delete Galeri item');
            }
        } else {
            // Galeri model not found
            return redirect()->back()->with('error', 'Galeri item not found');
        }

        // return redirect()->route('buku.edit', ['id' => $buku_id])->with('success', 'Gallery item deleted successfully');
    }
}
