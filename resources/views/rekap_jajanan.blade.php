@extends('layout.app')

@section('content')
    <h3>Rekap Jajanan Saya</h3>
    <p>Total Biaya Jajanan: Rp {{ number_format($totalBiayaJajanan, 0, ',', '.') }}</p>
    <p>Jumlah Jajanan: {{ $jumlahJajanan }}</p>
    <p>Kategori Jajanan: {{ $semuaKategori->count() }}</p>
    @foreach ($semuaKategori as $kategori)
        <p>{{ $kategori->nama_kategori }}: {{ $kategori->jajans->count() }} jajanan</p>
    @endforeach 
@endsection