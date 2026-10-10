@extends('layout.app')

@section('title', 'Daftar jajanan')

@section('content')
    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.15em] text-orange-600">Koleksi favorit</p>
            <h1 class="mt-1 text-3xl font-black tracking-tight">Daftar jajanan</h1>
            <p class="mt-2 text-sm text-stone-500">Semua jajanan yang sudah kamu catat.</p>
        </div>
        <a href="/jajanan/tambah" class="btn-primary"><svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 5v14m-7-7h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>Tambah jajanan</a>
    </div>

    <section class="mt-7 overflow-hidden rounded-2xl border border-stone-200 bg-white shadow-sm">
        <div class="flex items-center justify-between border-b border-stone-100 px-5 py-4 sm:px-6">
            <h2 class="font-bold">Koleksi jajanan</h2>
            <span class="rounded-full bg-orange-50 px-3 py-1 text-xs font-bold text-orange-700">{{ $semuaJajan->count() }} item</span>
        </div>
        @if($semuaJajan->isEmpty())
            <div class="px-6 py-16 text-center">
                <svg class="mx-auto size-12 text-orange-500" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 11h16l-2 8H6l-2-8ZM3 11h18M8 8c0-1.2 1-1.8 1-3m4 3c0-1.2 1-1.8 1-3m2 6 3-6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <h3 class="mt-4 font-bold">Belum ada jajanan</h3>
                <p class="mt-1 text-sm text-stone-500">Yuk, tambahkan jajanan pertama ke daftarmu.</p>
                <a href="/jajanan/tambah" class="btn-primary mt-5">Tambah jajanan</a>
            </div>
        @else
            <div class="hidden overflow-x-auto xl:block">
                <table class="w-full min-w-[860px] text-left text-sm">
                    <thead class="bg-stone-50 text-xs uppercase tracking-wider text-stone-500">
                        <tr><th class="px-6 py-3 font-semibold">#</th><th class="px-6 py-3 font-semibold">Nama jajanan</th><th class="px-6 py-3 font-semibold">Kategori</th><th class="px-6 py-3 font-semibold">Harga</th><th class="px-6 py-3 font-semibold">Ditambahkan</th><th class="px-6 py-3 font-semibold">Terakhir diperbarui</th><th class="px-6 py-3 font-semibold">Aksi</th></tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach($semuaJajan as $jajan)
                            <tr class="transition hover:bg-orange-50/40">
                                <td class="px-6 py-4 text-stone-400">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-6 py-4 font-semibold text-stone-800">{{ $jajan->nama_jajanan }}</td>
                                <td class="px-6 py-4"><span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-medium text-amber-800">{{ $jajan->kategoris->nama_kategori ?? 'Tanpa kategori' }}</span></td>
                                <td class="px-6 py-4 font-semibold">Rp {{ number_format($jajan->harga_jajanan, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-stone-500">{{ $jajan->created_at->format('d M Y, H:i') }}</td>
                                <td class="px-6 py-4 text-stone-500">{{ $jajan->updated_at->format('d M Y, H:i') }}</td>
                                <td class="px-6 py-4"><div class="flex gap-3"><a class="text-xs font-semibold text-orange-700 hover:text-orange-900" href="/jajanan/{{ $jajan->id }}/edit">Edit</a><a class="text-xs font-semibold text-rose-600 hover:text-rose-800" href="/jajanan/{{ $jajan->id }}/hapus" data-confirm-delete data-item-name="{{ $jajan->nama_jajanan }}">Hapus</a></div></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="grid gap-3 p-3 sm:p-4 xl:hidden">
                @foreach($semuaJajan as $jajan)
                    <article class="rounded-2xl border border-stone-200 bg-white p-4 shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-stone-400">Jajanan {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <h3 class="mt-1 break-words text-base font-bold text-stone-900">{{ $jajan->nama_jajanan }}</h3>
                            </div>
                            <p class="shrink-0 text-right text-sm font-bold text-stone-900">Rp {{ number_format($jajan->harga_jajanan, 0, ',', '.') }}</p>
                        </div>
                        <div class="mt-3">
                            <span class="inline-flex max-w-full rounded-full bg-amber-50 px-3 py-1 text-xs font-medium text-amber-800">{{ $jajan->kategoris->nama_kategori ?? 'Tanpa kategori' }}</span>
                        </div>
                        <dl class="mt-4 grid gap-2 border-t border-stone-100 pt-3">
                            <div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-1 text-xs">
                                <dt class="text-stone-500">Ditambahkan</dt>
                                <dd class="font-medium text-stone-700">{{ $jajan->created_at->format('d M Y, H:i') }}</dd>
                            </div>
                            <div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-1 text-xs">
                                <dt class="text-stone-500">Terakhir diperbarui</dt>
                                <dd class="font-medium text-stone-700">{{ $jajan->updated_at->format('d M Y, H:i') }}</dd>
                            </div>
                        </dl>
                        <div class="mt-4 flex gap-2 border-t border-stone-100 pt-3">
                            <a class="inline-flex min-h-10 flex-1 items-center justify-center rounded-xl bg-orange-50 px-3 py-2 text-xs font-semibold text-orange-800 transition hover:bg-orange-100" href="/jajanan/{{ $jajan->id }}/edit">Edit</a>
                            <a class="inline-flex min-h-10 flex-1 items-center justify-center rounded-xl bg-rose-50 px-3 py-2 text-xs font-semibold text-rose-700 transition hover:bg-rose-100" href="/jajanan/{{ $jajan->id }}/hapus" data-confirm-delete data-item-name="{{ $jajan->nama_jajanan }}">Hapus</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
@endsection
