@extends('layout.app')

@section('content')
    <a href='/tambah/kategori/jajanan'>Tambah Kategori Jajanan</a><br>
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
                        <a href='/edit/kategori/jajanan/{{$kategori->id}}'>Edit Kategori</a>
                        <a href='/hapus/kategori/jajanan/{{$kategori->id}}'>Hapus Kategori</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection