<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class PublicViewController extends Controller
{
    public function showList()
    {
        $data_buku = Buku::all();
        return view('buku.list_buku', compact('data_buku'));
    }
    public function showDetail(string $id)
    {
        $buku = Buku::find($id);
        return view('buku.detail', compact('buku'));
    }
}
