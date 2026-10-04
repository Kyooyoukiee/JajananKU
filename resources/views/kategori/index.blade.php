@extends('layout.app')

@section('content')
    <a href='/kategori-jajanan/tambah'>Tambah Kategori Jajanan</a><br>
    <h3>Daftar Kategori Jajanan</h3>
    <table border='1'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori Jajanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semuaKategori as $kategori)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$kategori->nama_kategori}}</td>
                    <td>
                        <a href='/kategori-jajanan/{{$kategori->id}}/edit'>Edit Kategori</a>
                        <a href='/kategori-jajanan/{{$kategori->id}}/hapus'>Hapus Kategori</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection