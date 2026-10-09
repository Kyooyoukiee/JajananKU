@extends('layout.app')

@section('title', 'Kategori jajanan')

@section('content')
    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.15em] text-orange-600">Susun koleksimu</p>
            <h1 class="mt-1 text-3xl font-black tracking-tight">Kategori jajanan</h1>
            <p class="mt-2 text-sm text-stone-500">Kelompokkan jajanan agar lebih mudah ditemukan.</p>
        </div>
        <a href="/kategori-jajanan/tambah" class="btn-primary"><svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 5v14m-7-7h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>Tambah kategori</a>
    </div>

    @if($semuaKategori->isEmpty())
        <section class="mt-7 rounded-2xl border border-stone-200 bg-white px-6 py-16 text-center shadow-sm">
            <svg class="mx-auto size-12 text-orange-500" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="4" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/></svg><h2 class="mt-4 font-bold">Belum ada kategori</h2>
            <p class="mt-1 text-sm text-stone-500">Buat kategori seperti makanan, minuman, atau camilan.</p>
            <a href="/kategori-jajanan/tambah" class="btn-primary mt-5">Buat kategori</a>
        </section>
    @else
        <section class="mt-7 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
            @foreach($semuaKategori as $kategori)
                <article class="rounded-2xl border border-stone-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                    <div class="flex items-start justify-between gap-3">
                        <span class="grid size-12 place-items-center rounded-2xl bg-orange-50 text-orange-600"><svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="4" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/></svg></span>
                        <span class="rounded-full bg-stone-100 px-3 py-1 text-xs font-semibold text-stone-600">{{ $loop->iteration }}</span>
                    </div>
                    <h2 class="mt-5 text-lg font-bold">{{ $kategori->nama_kategori }}</h2>
                    <div class="mt-2 grid gap-1.5 text-xs text-stone-500">
                        <p class="inline-flex items-center gap-1.5"><svg class="size-3.5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M16 3v4M8 3v4M3 10h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>Ditambahkan {{ $kategori->created_at->format('d M Y, H:i') }}</p>
                        <p class="inline-flex items-center gap-1.5"><svg class="size-3.5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>Terakhir diperbarui {{ $kategori->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div class="mt-4 flex gap-4 border-t border-stone-100 pt-4">
                        <a href="/kategori-jajanan/{{ $kategori->id }}/edit" class="text-xs font-semibold text-orange-700 hover:text-orange-900">Edit kategori</a>
                        <a href="/kategori-jajanan/{{ $kategori->id }}/hapus" class="text-xs font-semibold text-rose-600 hover:text-rose-800" data-confirm-delete data-item-name="{{ $kategori->nama_kategori }}">Hapus</a>
                    </div>
                </article>
            @endforeach
        </section>
    @endif
@endsection
