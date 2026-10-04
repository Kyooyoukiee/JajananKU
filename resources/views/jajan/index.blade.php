@extends('layout.app')

@section('content')
    <a href='/jajanan/tambah'>Tambah Jajanan</a>
    <br>
    <h3>Daftar Jajanan</h3>
    <table border='1'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jajanan</th>
                <th>Harga Jajanan</th>
                <th>Kategori Jajanan</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semuaJajan as $jajan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$jajan->nama_jajanan}}</td>
                <td>{{$jajan->harga_jajanan}}</td>
                <td>{{$jajan->kategoris->nama_kategori ?? 'Tidak ada kategori'}}</td>
                <td>{{$jajan->created_at->format('d-m-Y H:i')}}</td>
                <td>{{$jajan->updated_at->format('d-m-Y H:i')}}</td>
                <td>
                    <a href='/jajanan/{{$jajan->id}}/edit'>Edit Jajanan</a>
                    <a href='/jajanan/{{$jajan->id}}/hapus'>Hapus Jajanan</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection


