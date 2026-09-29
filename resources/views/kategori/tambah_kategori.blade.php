@extends('layout.app')

@section('content')
    <h3>Tambah Kategori Jajanan</h3>
    <p>Silahkan masukkan nama kategori jajanan yang anda inginkan</p>
    <a href='/kategori/jajanan'>Kembali</a>
    <form action='/simpan/kategori/jajanan' method='POST'>
        @csrf
        Masukkan Nama Kategori:
        <input type='text' name='nama_kategori' />
        @error('nama_kategori')
            <div style='color: red'>{{$message}}</div>
        @enderror
        <br>
        <input type='submit' value='Simpan Nama Kategori' />
    </form>
@endsection