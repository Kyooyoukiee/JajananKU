@extends('layout.app')

@section('title', 'Edit kategori')

@section('content')
    <a href="/kategori-jajanan" class="back-link">← Kembali ke kategori</a>
    <div class="mx-auto mt-5 max-w-2xl">
        <div class="mb-6"><p class="text-xs font-bold uppercase tracking-[0.15em] text-orange-600">Susun koleksimu</p><h1 class="mt-1 text-3xl font-black tracking-tight">Edit kategori</h1><p class="mt-2 text-sm text-stone-500">Perbarui nama kategori jajanan.</p></div>
        <form action="/kategori-jajanan/{{ $kategori->id }}/simpanedit" method="POST" class="form-card" novalidate>
            @csrf
            <div class="form-field">
                <label for="nama_kategori">Nama kategori</label>
                <input id="nama_kategori" type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
                @error('nama_kategori')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-stone-100 pt-5 sm:flex-row sm:justify-end"><a href="/kategori-jajanan" class="btn-secondary">Batal</a><button type="submit" class="btn-primary">Simpan perubahan</button></div>
        </form>
    </div>
@endsection
