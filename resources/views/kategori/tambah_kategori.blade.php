@extends('layout.app')

@section('title', 'Tambah kategori')

@section('content')
    <a href="/kategori-jajanan" class="back-link group"><svg class="size-4 transition-transform group-hover:-translate-x-0.5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M19 12H5m7 7-7-7 7-7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>Kembali ke kategori</a>
    <div class="mx-auto mt-5 max-w-2xl">
        <div class="mb-6"><p class="text-xs font-bold uppercase tracking-[0.15em] text-orange-600">Susun koleksimu</p><h1 class="mt-1 text-3xl font-black tracking-tight">Tambah kategori</h1><p class="mt-2 text-sm text-stone-500">Buat kelompok baru untuk jajanan favoritmu.</p></div>
        <form action="/kategori-jajanan/simpan" method="POST" class="form-card" novalidate>
            @csrf
            <div class="form-field">
                <label for="nama_kategori">Nama kategori</label>
                <input id="nama_kategori" type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="Contoh: Camilan manis">
                @error('nama_kategori')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-stone-100 pt-5 sm:flex-row sm:justify-end"><a href="/kategori-jajanan" class="btn-secondary">Batal</a><button type="submit" class="btn-primary">Simpan kategori</button></div>
        </form>
    </div>
@endsection
