<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f8f8f5">
    <title>@yield('title', 'JajananKU') · JajananKU</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-stone-50 text-stone-900 antialiased">
    <div class="min-h-screen lg:grid lg:grid-cols-[250px_minmax(0,1fr)]">
        <aside class="border-b border-stone-200 bg-white px-5 py-5 lg:fixed lg:inset-y-0 lg:flex lg:w-[250px] lg:flex-col lg:border-b-0 lg:border-r lg:px-6 lg:py-8">
            <a class="flex items-center gap-3">
                <span class="grid size-11 place-items-center rounded-2xl bg-orange-100 text-orange-700">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 11h16l-2 8H6l-2-8Z" fill="currentColor" opacity=".18"/><path d="M4 11h16l-2 8H6l-2-8ZM3 11h18M8 8c0-1.2 1-1.8 1-3m4 3c0-1.2 1-1.8 1-3m2 6 3-6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span>
                    <span class="block text-lg font-extrabold tracking-tight">Jajanan<span class="text-orange-600">KU</span></span>
                    <span class="block text-xs text-stone-500">Catatan jajanan favorit</span>
                </span>
            </a>

            <p class="mb-3 mt-8 text-[11px] font-bold uppercase tracking-[0.16em] text-stone-400">Menu utama</p>
            <nav class="grid grid-cols-2 gap-2 sm:flex sm:flex-wrap lg:flex-col" aria-label="Navigasi utama">
                <a href="/" @class(['nav-link', 'nav-link-active' => request()->is('/')])><span><svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1V10Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg></span> Beranda</a>
                <a href="/jajanan" @class(['nav-link', 'nav-link-active' => request()->is('jajanan') || request()->is('jajanan/*') && !request()->is('jajanan/rekap')])><span><svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 10h16l-2 10H6L4 10ZM3 10h18M8 7c0-1.2 1-1.8 1-3m4 3c0-1.2 1-1.8 1-3m2 6 2-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Daftar jajanan</a>
                <a href="/kategori-jajanan" @class(['nav-link', 'nav-link-active' => request()->is('kategori-jajanan*')])><span><svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="4" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/></svg></span> Kategori</a>
                <a href="/jajanan/rekap" @class(['nav-link', 'nav-link-active' => request()->is('jajanan/rekap')])><span><svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 20V11h4v9H4Zm6 0V4h4v16h-4Zm6 0v-7h4v7h-4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg></span> Rekap data</a>
            </nav>

            <div class="mt-8 hidden rounded-2xl bg-orange-50 p-4 lg:mt-auto lg:block">
                <svg class="size-6 text-orange-600" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 2 1.7 6.3L20 10l-6.3 1.7L12 18l-1.7-6.3L4 10l6.3-1.7L12 2ZM19 14l1 3 3 1-3 1-1 3-1-3-3-1 3-1 1-3Z" fill="currentColor"/></svg>
                <p class="mt-3 text-sm font-bold">Jajan jadi lebih tertata</p>
                <p class="mt-1 text-xs leading-5 text-stone-600">Simpan daftar favoritmu dan lihat ringkasannya kapan saja.</p>
            </div>
        </aside>

        <div class="min-w-0 lg:col-start-2 lg:pl-0">
            <header class="hidden h-[76px] items-center justify-between border-b border-stone-200 bg-white px-8 lg:flex xl:px-12">
                <p class="text-sm text-stone-500">Ruang kecil untuk jajanan favoritmu</p>
                <span class="inline-flex items-center gap-2 rounded-full bg-orange-50 px-4 py-2 text-xs font-semibold text-orange-700">Selamat datang <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 11V5a2 2 0 0 1 4 0v5-6a2 2 0 0 1 4 0v7-5a2 2 0 0 1 4 0v8a7 7 0 0 1-7 7h-1a7 7 0 0 1-5.7-2.9L3 14a2 2 0 0 1 3-2l2 2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            </header>
            <main class="mx-auto w-full max-w-7xl px-5 py-8 sm:px-8 lg:px-10 lg:py-10 xl:px-12">
                @yield('content')
            </main>
            <footer class="mx-auto max-w-7xl px-5 pb-8 text-xs text-stone-400 sm:px-8 lg:px-10 xl:px-12">Dibuat dengan suka cita · JajananKU</footer>
        </div>
    </div>
    <div id="delete-confirmation" class="fixed inset-0 z-50 hidden items-center justify-center bg-stone-950/50 px-4 py-8 backdrop-blur-sm" aria-hidden="true">
        <section class="delete-confirmation-panel w-full max-w-md rounded-3xl border border-stone-200 bg-white p-6 shadow-2xl sm:p-7" role="alertdialog" aria-modal="true" aria-labelledby="delete-confirmation-title" aria-describedby="delete-confirmation-message" tabindex="-1">
            <div class="grid size-12 place-items-center rounded-2xl bg-rose-50 text-rose-600">
                <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M10 11v6m4-6v6M5 7l1 13h12l1-13M9 7V4h6v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <h2 id="delete-confirmation-title" class="mt-5 text-lg font-bold">Hapus data ini?</h2>
            <p id="delete-confirmation-message" class="mt-2 text-sm leading-6 text-stone-500">Data yang dihapus tidak dapat dikembalikan.</p>
            <div class="mt-7 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <button id="cancel-delete" class="btn-secondary" type="button">Batal</button>
                <button id="confirm-delete" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl bg-rose-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-rose-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-600" type="button">Hapus data</button>
            </div>
        </section>
    </div>
</body>
</html>
