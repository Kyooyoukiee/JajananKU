@extends('layout.app')

@section('title', 'Rekap jajanan')

@section('content')
    <div>
        <p class="text-xs font-bold uppercase tracking-[0.15em] text-orange-600">Lihat gambaran umum</p>
        <h1 class="mt-1 text-3xl font-black tracking-tight">Rekap jajanan</h1>
        <p class="mt-2 text-sm text-stone-500">Ringkasan dari jajanan dan kategori yang sudah kamu catat.</p>
    </div>

    <section class="mt-7 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        <article class="rounded-2xl border border-stone-200 bg-white p-5 shadow-sm"><div class="flex items-center justify-between"><span class="text-sm font-medium text-stone-500">Total harga jajanan</span><span class="grid size-10 place-items-center rounded-xl bg-orange-50 text-orange-600"><svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/><path d="M15 8.5c-.6-.7-1.5-1-2.7-1-1.5 0-2.5.7-2.5 1.8 0 2.9 5.7 1.2 5.7 4.4 0 1.2-1.1 2-2.8 2-1.2 0-2.3-.4-3-1.2M12 5.5v13" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></span></div><p class="mt-4 text-2xl font-black tracking-tight">Rp {{ number_format($totalBiayaJajanan, 0, ',', '.') }}</p><p class="mt-1 text-xs text-stone-400">Akumulasi harga di daftar</p></article>
        <article class="rounded-2xl border border-stone-200 bg-white p-5 shadow-sm"><div class="flex items-center justify-between"><span class="text-sm font-medium text-stone-500">Jumlah jajanan</span><span class="grid size-10 place-items-center rounded-xl bg-amber-50 text-amber-700"><svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 10h16l-2 10H6L4 10ZM3 10h18M8 7c0-1.2 1-1.8 1-3m4 3c0-1.2 1-1.8 1-3m2 6 2-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></span></div><p class="mt-4 text-2xl font-black tracking-tight">{{ $jumlahJajanan }} <span class="text-base font-semibold text-stone-400">item</span></p><p class="mt-1 text-xs text-stone-400">Jajanan tersimpan</p></article>
        <article class="rounded-2xl border border-stone-200 bg-white p-5 shadow-sm sm:col-span-2 xl:col-span-1"><div class="flex items-center justify-between"><span class="text-sm font-medium text-stone-500">Kategori</span><span class="grid size-10 place-items-center rounded-xl bg-sky-50 text-sky-700"><svg class="size-5" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="4" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/></svg></span></div><p class="mt-4 text-2xl font-black tracking-tight">{{ $semuaKategori->count() }} <span class="text-base font-semibold text-stone-400">kategori</span></p><p class="mt-1 text-xs text-stone-400">Kelompok jajanan yang dibuat</p></article>
    </section>

    <section class="mt-5 grid gap-5 xl:grid-cols-[minmax(0,1.4fr)_minmax(280px,0.8fr)]">
        <article class="rounded-2xl border border-stone-200 bg-white p-5 shadow-sm sm:p-6">
            <div><h2 class="font-bold">Jajanan per kategori</h2><p class="mt-1 text-xs text-stone-500">Jumlah jajanan yang tersimpan di setiap kategori.</p></div>
            @if($semuaKategori->isEmpty())
                <div class="grid min-h-64 place-items-center text-center"><div><svg class="mx-auto size-10 text-orange-500" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 20V11h4v9H4Zm6 0V4h4v16h-4Zm6 0v-7h4v7h-4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg><p class="mt-3 text-sm font-semibold">Belum ada data kategori</p><a href="/kategori-jajanan/tambah" class="mt-2 inline-flex items-center gap-1 text-sm font-semibold text-orange-700">Buat kategori pertama <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a></div></div>
            @else
                <div class="relative mt-5 h-72"><canvas id="grafikKategori" aria-label="Diagram jumlah jajanan per kategori" role="img"></canvas></div>
            @endif
        </article>
        <article class="rounded-2xl border border-stone-200 bg-white p-5 shadow-sm sm:p-6">
            <div class="flex items-center justify-between"><div><h2 class="font-bold">Kategori</h2><p class="mt-1 text-xs text-stone-500">Ringkasan isi koleksi</p></div><a href="/kategori-jajanan" class="inline-flex items-center gap-1 text-xs font-semibold text-orange-700 hover:text-orange-900">Lihat semua <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a></div>
            <div class="mt-4 divide-y divide-stone-100">
                @forelse($semuaKategori as $kategori)
                    <div class="flex items-center justify-between gap-3 py-3"><div class="flex min-w-0 items-center gap-3"><span class="grid size-9 shrink-0 place-items-center rounded-xl bg-orange-50 text-orange-600"><svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="4" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/><rect x="13" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/></svg></span><span class="truncate text-sm font-semibold">{{ $kategori->nama_kategori }}</span></div><span class="shrink-0 rounded-full bg-stone-100 px-2.5 py-1 text-xs font-semibold text-stone-600">{{ $kategori->jajans_count }} item</span></div>
                @empty
                    <p class="py-8 text-center text-sm text-stone-500">Kategori belum tersedia.</p>
                @endforelse
            </div>
        </article>
    </section>
    @if($semuaKategori->isNotEmpty())
        <script id="label-kategori" type="application/json">@json($semuaKategori->pluck('nama_kategori')->values())</script>
        <script id="jumlah-jajanan-per-kategori" type="application/json">@json($semuaKategori->pluck('jajans_count')->values())</script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const labelKategori = JSON.parse(document.getElementById('label-kategori').textContent);
            const jumlahJajananPerKategori = JSON.parse(document.getElementById('jumlah-jajanan-per-kategori').textContent);
            const warnaKategori = ['#ea580c', '#f59e0b', '#0ea5e9', '#e11d48', '#16a34a', '#8b5cf6'];

            const tampilkanTooltip = ({ chart, tooltip }) => {
                let tooltipElement = document.getElementById('tooltip-grafik-kategori');

                if (!tooltipElement) {
                    tooltipElement = document.createElement('div');
                    tooltipElement.id = 'tooltip-grafik-kategori';
                    tooltipElement.className = 'chart-tooltip';

                    const titleElement = document.createElement('p');
                    titleElement.className = 'chart-tooltip-title';

                    const valueRow = document.createElement('div');
                    valueRow.className = 'chart-tooltip-value-row';

                    const colorElement = document.createElement('span');
                    colorElement.className = 'chart-tooltip-color';

                    const valueElement = document.createElement('p');
                    valueElement.className = 'chart-tooltip-value';

                    valueRow.append(colorElement, valueElement);
                    tooltipElement.append(titleElement, valueRow);
                    chart.canvas.parentNode.appendChild(tooltipElement);
                }

                if (tooltip.opacity === 0) {
                    tooltipElement.style.opacity = '0';
                    return;
                }

                const titleElement = tooltipElement.querySelector('.chart-tooltip-title');
                const colorElement = tooltipElement.querySelector('.chart-tooltip-color');
                const valueElement = tooltipElement.querySelector('.chart-tooltip-value');
                const dataPoint = tooltip.dataPoints[0];

                titleElement.textContent = tooltip.title[0] ?? '';
                colorElement.style.backgroundColor = tooltip.labelColors[0].backgroundColor;
                valueElement.textContent = `${dataPoint.formattedValue} jajanan`;

                tooltipElement.classList.toggle('chart-tooltip-below', tooltip.caretY < 56);
                tooltipElement.style.left = `${chart.canvas.offsetLeft + tooltip.caretX}px`;
                tooltipElement.style.top = `${chart.canvas.offsetTop + tooltip.caretY}px`;
                tooltipElement.style.opacity = '1';
            };

            new Chart(document.getElementById('grafikKategori'), {
                type: 'bar',
                data: {
                    labels: labelKategori,
                    datasets: [{
                        data: jumlahJajananPerKategori,
                        backgroundColor: labelKategori.map((_, index) => warnaKategori[index % warnaKategori.length]),
                        borderRadius: 8,
                        maxBarThickness: 42,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            enabled: false,
                            external: tampilkanTooltip,
                        },
                    },
                    scales: {
                        x: { grid: { display: false }, ticks: { color: '#78716c' } },
                        y: { beginAtZero: true, ticks: { precision: 0, color: '#78716c' }, grid: { color: '#f5f5f4' } },
                    },
                },
            });
        </script>
    @endif
@endsection
