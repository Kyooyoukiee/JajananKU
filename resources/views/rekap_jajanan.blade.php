@extends('layout.app')

@section('content')
    <h3>Rekap Jajanan Saya</h3>
    <p>Disini anda dapat melihat rekap jajanan yang telah anda tambahkan</p>
    <p>Total Biaya Jajanan: Rp {{ number_format($totalBiayaJajanan, 0, ',', '.') }}</p>
    <p>Jumlah Jajanan: {{ $jumlahJajanan }}</p>
    <p>Kategori Jajanan: {{ $semuaKategori->count() }}</p>

    <div style="max-width: 360px; height: 250px; margin: 24px 0;">
        <canvas id="grafikKategori"></canvas>
    </div>

    <script id="label-kategori" type="application/json">@json($semuaKategori->pluck('nama_kategori')->values())</script>
    <script id="jumlah-jajanan-per-kategori" type="application/json">@json($semuaKategori->pluck('jajans_count')->values())</script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labelKategori = JSON.parse(document.getElementById('label-kategori').textContent);
        const jumlahJajananPerKategori = JSON.parse(
            document.getElementById('jumlah-jajanan-per-kategori').textContent,
        );
        const warnaKategori = ['#3b82f6', '#8b5cf6', '#ec4899', '#f97316', '#14b8a6', '#eab308'];

        new Chart(document.getElementById('grafikKategori'), {
            type: 'bar',
            data: {
                labels: labelKategori,
                datasets: [{
                    label: 'Jumlah Jajanan',
                    data: jumlahJajananPerKategori,
                    backgroundColor: labelKategori.map((_, index) => warnaKategori[index % warnaKategori.length]),
                    borderRadius: 4,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Jumlah Jajanan per Kategori',
                    },
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                        },
                    },
                },
            },
        });
    </script>
@endsection
