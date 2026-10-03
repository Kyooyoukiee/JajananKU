@extends('layout.app')
@section('content')
    <h3>Tambah Jajanan</h3>
    <p>Silahkan masukkan nama jajanan yang anda inginkan</p>
    <a href="/daftar/jajanan">Kembali ke Daftar Jajanan</a>
    <form action='/simpan/jajanan' method='POST'>
        @csrf
        Masukkan Nama Jajanan:
        <input type='text' name='nama_jajanan' value="{{ old('nama_jajanan') }}" />
        @error('nama_jajanan')
            <div style='color: red'>{{$message}}</div>
        @enderror
        <br>
        Masukkan Harga Jajanan:
        <input type='text' name='harga_jajanan' value="{{ old('harga_jajanan') }}" />
        @error('harga_jajanan')
            <div style='color: red'>{{$message}}</div>
        @enderror
        <br>
        Masukkan Kategori Jajanan:
        <select name='kategori_id'>
            <option value=''>Pilih Kategori</option>
            @foreach($semuaKategori as $kategori)
                <option value='{{ $kategori->id }}' {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>
        @error('kategori_id')
            <div style='color: red'>{{$message}}</div>
        @enderror
        <br>
        <input type='submit' value='Simpan Jajanan' /> 
    </form>
@endsection 