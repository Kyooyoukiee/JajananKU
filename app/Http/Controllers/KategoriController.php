<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function kategori_jajanan(){
        $semuaKategori = Kategori::all();
        return view('kategori.index', compact('semuaKategori'));
    }
    public function tambah_kategori_jajanan(){
        return view('kategori.tambah_kategori');
    }
    public function simpan_kategori_jajanan(Request $request, $id = null){
        $request->validate([
            'nama_kategori' => 'required|max:100',
        ],[
            'nama_kategori.required' => 'Nama kategorinya harus diisi',
            'nama_kategori.max' => 'Nama kategorinya hanya bermaksimal 100 karakter saja'
        ]);

        if ($id){
            $kategori = Kategori::findOrFail($id);
            $kategori->update($request->all());
        }
        else {
            $kategori = Kategori::create($request->all());
        }
        return redirect('/kategori-jajanan');
    }
    public function hapus_kategori_jajanan(int $id){
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect('/kategori-jajanan');
    }
        public function edit_kategori_jajanan(int $id){
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit_kategori', compact('kategori'));
    }
}
