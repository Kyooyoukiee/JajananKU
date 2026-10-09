@extends('layout.app')

@section('title', 'Tambah jajanan')

@section('content')
    <a href="/jajanan" class="back-link">← Kembali ke daftar jajanan</a>
    <div class="mx-auto mt-5 max-w-2xl">
        <div class="mb-6"><p class="text-xs font-bold uppercase tracking-[0.15em] text-orange-600">Koleksi favorit</p><h1 class="mt-1 text-3xl font-black tracking-tight">Tambah jajanan</h1><p class="mt-2 text-sm text-stone-500">Isi detailnya, nanti tersimpan di daftarmu.</p></div>
        <form action="/jajanan/simpan" method="POST" class="form-card" novalidate>
            @csrf
            <div class="form-field">
                <label for="nama_jajanan">Nama jajanan</label>
                <input id="nama_jajanan" type="text" name="nama_jajanan" value="{{ old('nama_jajanan') }}" placeholder="Contoh: Martabak mini">
                @error('nama_jajanan')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-field">
                <label for="harga_jajanan">Harga</label>
                <div class="relative"><span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-semibold text-stone-400">Rp</span><input id="harga_jajanan" class="!pl-12" type="number" name="harga_jajanan" value="{{ old('harga_jajanan') }}" placeholder="Contoh: 15000"></div>
                @error('harga_jajanan')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-field">
                <label for="kategori_id">Kategori</label>
                <select id="kategori_id" name="kategori_id"><option value="">Pilih kategori</option>@foreach($semuaKategori as $kategori)<option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>@endforeach</select>
                @error('kategori_id')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-stone-100 pt-5 sm:flex-row sm:justify-end"><a href="/jajanan" class="btn-secondary">Batal</a><button type="submit" class="btn-primary">Simpan jajanan</button></div>
        </form>
    </div>
@endsection
