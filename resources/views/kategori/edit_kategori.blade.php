@extends('layout.app')

@section('content')
    <h3>Edit Kategori Jajanan</h3>
    <p>Silahkan edit nama kategori jajanan yang anda inginkan</p>
    <a href='/kategori/jajanan'>Kembali</a>
    <form action='/simpanedit/kategori/jajanan/{{$kategori->id}}' method='POST'>
        @csrf
        Edit Nama Kategori:
        <input type='text' name='nama_kategori' value='{{$kategori->nama_kategori}}' />
        @error('nama_kategori')
            <div style='color: red'>{{$message}}</div>
        @enderror
        <br>
        <input type='submit' value='Simpan Nama Kategori' />
    </form>
@endsection