@extends('layout.app')
@section('content')
    <h3>Edit Jajanan</h3>
    <p>Silahkan edit nama jajanan yang anda inginkan</p>
    <a href="/daftar/jajanan">Kembali ke Daftar Jajanan</a>
    <form action='/simpanedit/jajanan/{{$jajan->id}}' method='POST'>
        @csrf
        Edit Nama Jajanan:
        <input type='text' name='nama_jajanan' value="{{ $jajan->nama_jajanan }}" />
        @error('nama_jajanan')
            <div style='color: red'>{{$message}}</div>
        @enderror
        <br>
        Edit Harga Jajanan:
        <input type='text' name='harga_jajanan' value="{{ $jajan->harga_jajanan }}" />
        @error('harga_jajanan')
            <div style='color: red'>{{$message}}</div>
        @enderror
        <br>
        Edit Kategori Jajanan:
        <select name='kategori_id'>
            <option value=''>Pilih Kategori</option>
            @foreach($semuaKategori as $kategori)
                <option value='{{ $kategori->id }}' {{ $jajan->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>
        @error('kategori_id')
            <div style='color: red'>{{$message}}</div>
        @enderror
        <br>
        <input type='submit' value='Simpan Jajanan' /> 
    </form>
@endsection