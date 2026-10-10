@extends('layout.app')

@section('title', 'Beranda')

@section('content')
    <section class="relative isolate overflow-hidden rounded-[2rem] bg-orange-600 px-6 py-9 text-white shadow-xl shadow-orange-900/10 sm:px-10 sm:py-12 lg:px-14 lg:py-16">
        <div class="absolute -right-8 -top-12 -z-10 size-64 rounded-full bg-orange-500/70 blur-2xl"></div>
        <div class="absolute -bottom-24 right-1/4 -z-10 size-64 rounded-full bg-amber-300/30 blur-3xl"></div>
        <div class="max-w-2xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-3 py-1.5 text-xs font-semibold tracking-wide">RAPI, PRAKTIS, DAN MANIS <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 2 1.7 6.3L20 10l-6.3 1.7L12 18l-1.7-6.3L4 10l6.3-1.7L12 2ZM19 14l1 3 3 1-3 1-1 3-1-3-3-1 3-1 1-3Z" fill="currentColor"/></svg></span>
            <h1 class="mt-5 text-4xl font-black leading-tight tracking-tight sm:text-5xl">Semua jajanan<br class="hidden sm:block"> favorit, satu tempat.</h1>
            <p class="mt-4 max-w-xl text-sm leading-7 text-orange-50 sm:text-base">Catat jajanan yang kamu suka, kelompokkan berdasarkan kategori, dan lihat rekapnya dengan mudah.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="/jajanan" class="inline-flex items-center gap-2 rounded-xl border border-white/40 px-5 py-3 text-sm font-bold text-white transition hover:bg-white/10">Lihat daftar <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
            </div>
        </div>
        <svg class="snack-float pointer-events-none absolute bottom-3 right-6 hidden h-36 w-36 text-amber-100 opacity-90 sm:block lg:bottom-2 lg:right-12 lg:h-48 lg:w-48" viewBox="0 0 160 160" fill="none" aria-hidden="true">
            <path d="M27 76h106l-10 43a17 17 0 0 1-17 13H54a17 17 0 0 1-17-13L27 76Z" fill="currentColor"/>
            <path d="M20 75h120M49 65c-8-13 8-15 0-28m27 29c-8-13 8-15 0-28m27 27c-8-13 8-15 0-28" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
            <path d="M38 94h84" stroke="#c2410c" stroke-width="5" stroke-linecap="round" opacity=".55"/>
            <path d="m99 43 26-25m-15 34 28-24" stroke="#fff7ed" stroke-width="5" stroke-linecap="round"/>
            <circle cx="52" cy="104" r="5" fill="#c2410c" opacity=".55"/><circle cx="78" cy="111" r="5" fill="#c2410c" opacity=".55"/><circle cx="105" cy="103" r="5" fill="#c2410c" opacity=".55"/>
        </svg>
    </section>

    <section class="mt-9">
        <div class="mb-4 flex items-end justify-between gap-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.15em] text-orange-600">Mulai dari sini</p>
                <h2 class="mt-1 text-xl font-extrabold tracking-tight">Kelola catatanmu</h2>
            </div>
            <span class="hidden text-sm text-stone-500 sm:block">Pilih yang ingin kamu lakukan</span>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
            <a href="/jajanan" class="group rounded-2xl border border-stone-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-orange-200 hover:shadow-md">
                <span class="grid size-12 place-items-center rounded-2xl bg-amber-100 text-amber-700"><svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 10h16l-2 10H6L4 10ZM3 10h18M8 7c0-1.2 1-1.8 1-3m4 3c0-1.2 1-1.8 1-3m2 6 2-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                <h3 class="mt-4 flex items-center justify-between font-bold">Daftar jajanan <svg class="size-4 text-stone-300 transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-orange-600" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></h3>
                <p class="mt-1 text-sm leading-6 text-stone-500">Lihat, tambah, dan perbarui jajanan favoritmu.</p>
            </a>
            <a href="/kategori-jajanan" class="group rounded-2xl border border-stone-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-orange-200 hover:shadow-md">
                <span class="grid size-12 place-items-center rounded-2xl bg-rose-100 text-rose-700"><svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="4" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/></svg></span>
                <h3 class="mt-4 flex items-center justify-between font-bold">Kategori <svg class="size-4 text-stone-300 transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-orange-600" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></h3>
                <p class="mt-1 text-sm leading-6 text-stone-500">Kelompokkan jajanan agar daftar lebih mudah dibaca.</p>
            </a>
            <a href="/jajanan/rekap" class="group rounded-2xl border border-stone-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-orange-200 hover:shadow-md sm:col-span-2 xl:col-span-1">
                <span class="grid size-12 place-items-center rounded-2xl bg-sky-100 text-sky-700"><svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 20V11h4v9H4Zm6 0V4h4v16h-4Zm6 0v-7h4v7h-4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg></span>
                <h3 class="mt-4 flex items-center justify-between font-bold">Rekap data <svg class="size-4 text-stone-300 transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-orange-600" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></h3>
                <p class="mt-1 text-sm leading-6 text-stone-500">Intip ringkasan jumlah dan total harga jajanan.</p>
            </a>
        </div>
    </section>
@endsection
