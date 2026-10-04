@extends('layout.app')

@section('content')
    <a href='/kategori-jajanan/tambah'>Tambah Kategori Jajanan</a><br>
    <h3>Daftar Kategori Jajanan</h3>
    <table border='1'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori Jajanan</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semuaKategori as $kategori)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$kategori->nama_kategori}}</td>
                    <td>{{$kategori->created_at->format('d-m-Y H:i')}}</td>
                    <td>{{$kategori->updated_at->format('d-m-Y H:i')}}</td>
                    <td>
                        <a href='/kategori-jajanan/{{$kategori->id}}/edit'>Edit Kategori</a>
                        <a href='/kategori-jajanan/{{$kategori->id}}/hapus'>Hapus Kategori</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection