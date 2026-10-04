<?php

namespace App\Http\Controllers;

use App\Models\Jajan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class JajanController extends Controller
{
    public function index()
    {
        $semuaJajan = Jajan::all();

        return view('jajan.index', compact('semuaJajan'));
    }

    public function tambah_jajanan()
    {
        $semuaKategori = Kategori::all();

        return view('jajan.tambah_jajanan', compact('semuaKategori'));
    }

    public function simpan_jajanan(Request $request, $id = null)
    {
        $request->validate([
            'nama_jajanan' => 'required',
            'harga_jajanan' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
        ], [
            'nama_jajanan.required' => 'Nama jajanan harus diisi.',
            'harga_jajanan.required' => 'Harga jajanan harus diisi.',
            'harga_jajanan.numeric' => 'Harga jajanan harus berupa angka.',
            'kategori_id.required' => 'Kategori harus dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
        ]);

        if ($id) {
            $jajan = Jajan::findOrFail($id);
            $jajan->update($request->all());
        } else {
            $jajan = Jajan::create($request->all());
        }

        $jajan->kategori_id = $request->kategori_id;
        $jajan->nama_jajanan = $request->nama_jajanan;
        $jajan->harga_jajanan = $request->harga_jajanan;
        $jajan->save();

        return redirect('/jajanan');
    }

    public function hapus_jajanan(int $id)
    {
        $jajan = Jajan::findOrFail($id);
        $jajan->delete();

        return redirect('/jajanan');
    }

    public function edit_jajanan(int $id)
    {
        $jajan = Jajan::findOrFail($id);
        $semuaKategori = Kategori::all();

        return view('jajan.edit_jajanan', compact('jajan', 'semuaKategori'));
    }

    public function rekap_jajanan()
    {
        $semuaJajan = Jajan::all();
        $totalBiayaJajanan = $semuaJajan->sum('harga_jajanan');
        $jumlahJajanan = $semuaJajan->count();
        $semuaKategori = Kategori::withCount('jajans')->get();

        return view('rekap_jajanan', compact(
            'semuaJajan',
            'totalBiayaJajanan',
            'semuaKategori',
            'jumlahJajanan'
        ));
    }
}
