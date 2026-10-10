@extends('layout.app')

@section('title', 'Edit jajanan')

@section('content')
    <a href="/jajanan" class="back-link group"><svg class="size-4 transition-transform group-hover:-translate-x-0.5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M19 12H5m7 7-7-7 7-7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>Kembali ke daftar jajanan</a>
    <div class="mx-auto mt-5 max-w-2xl">
        <div class="mb-6"><p class="text-xs font-bold uppercase tracking-[0.15em] text-orange-600">Perbarui koleksi</p><h1 class="mt-1 text-3xl font-black tracking-tight">Edit jajanan</h1><p class="mt-2 text-sm text-stone-500">Ubah detail jajanan sesuai kebutuhan.</p></div>
        <form action="/jajanan/{{ $jajan->id }}/simpanedit" method="POST" class="form-card" novalidate>
            @csrf
            <div class="form-field">
                <label for="nama_jajanan">Nama jajanan</label>
                <input id="nama_jajanan" type="text" name="nama_jajanan" value="{{ old('nama_jajanan', $jajan->nama_jajanan) }}">
                @error('nama_jajanan')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-field">
                <label for="harga_jajanan">Harga</label>
                <div class="relative"><span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-semibold text-stone-400">Rp</span><input id="harga_jajanan" class="!pl-12" type="number" name="harga_jajanan" value="{{ old('harga_jajanan', $jajan->harga_jajanan) }}"></div>
                @error('harga_jajanan')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-field">
                <label id="kategori_id_label" for="kategori_id">Kategori</label>
                <div class="custom-select" data-custom-select>
                    <input type="hidden" id="kategori_id_value" name="kategori_id" value="{{ old('kategori_id', $jajan->kategori_id) }}" data-select-value>
                    <button class="custom-select-trigger" id="kategori_id" type="button" role="combobox" aria-haspopup="listbox" aria-expanded="false" aria-controls="kategori_id_options" aria-labelledby="kategori_id_label" data-select-trigger>
                        <span data-select-label>{{ $semuaKategori->firstWhere('id', old('kategori_id', $jajan->kategori_id))?->nama_kategori ?? 'Pilih kategori' }}</span>
                        <svg class="size-4 shrink-0 text-stone-500 transition-transform" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m7 10 5 5 5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    <div class="custom-select-options hidden" id="kategori_id_options" role="listbox" aria-labelledby="kategori_id_label" data-select-options>
                        <button class="custom-select-option" type="button" role="option" aria-selected="{{ old('kategori_id', $jajan->kategori_id) ? 'false' : 'true' }}" data-option-value="">Pilih kategori</button>
                        @foreach($semuaKategori as $kategori)
                            <button class="custom-select-option" type="button" role="option" aria-selected="{{ old('kategori_id', $jajan->kategori_id) == $kategori->id ? 'true' : 'false' }}" data-option-value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</button>
                        @endforeach
                    </div>
                </div>
                @error('kategori_id')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-stone-100 pt-5 sm:flex-row sm:justify-end"><a href="/jajanan" class="btn-secondary">Batal</a><button type="submit" class="btn-primary">Simpan perubahan</button></div>
        </form>
    </div>
@endsection
