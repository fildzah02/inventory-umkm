
@extends('layouts.app')

@section('title', 'Analisis Stok - Inventory UMKM')

@section('heading', 'Analisis Stok Barang')

@section('content')

<div class="row g-3 mb-4">

    <div class="col-md-4 col-xl">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <small class="text-muted">Total Barang</small>
                <h3 class="fw-bold text-primary">{{ $totalBarang }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <small class="text-muted">Total Stok</small>
                <h3 class="fw-bold text-info">{{ $totalStok }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <small class="text-muted">Stok Aman</small>
                <h3 class="fw-bold text-success">{{ $stokAman }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <small class="text-muted">Stok Menipis</small>
                <h3 class="fw-bold text-warning">{{ $stokMenipis }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <small class="text-muted">Stok Habis</small>
                <h3 class="fw-bold text-danger">{{ $stokHabis }}</h3>
            </div>
        </div>
    </div>

</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <h5>📦 Total Kebutuhan Pengadaan</h5>
        <h2 class="fw-bold text-primary">
            {{ number_format($totalKebutuhan) }} Unit
        </h2>
        <p class="text-muted mb-0">
            Jumlah unit yang dibutuhkan untuk mencapai target stok seluruh barang.
        </p>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <h5 class="mb-3">📊 Hasil Analisis Persediaan</h5>

        <p class="text-muted">
            Hasil perhitungan stok akhir dan kebutuhan pengadaan setiap barang.
        </p>

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Stok Akhir</th>
                        <th>Stok Minimum</th>
                        <th>Target Stok</th>
                        <th>Kebutuhan</th>
                        <th>Status</th>
                        <th>Estimasi Biaya</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($barang as $index => $item)

                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>{{ $item['kode'] }}</td>

                            <td>{{ $item['nama'] }}</td>

                            <td>{{ $item['stok_akhir'] }}</td>

                            <td>{{ $item['stok_minimum'] }}</td>

                            <td>{{ $item['stok_target'] }}</td>

                            <td>
                                @if ($item['kebutuhan'] > 0)
                                    <strong class="text-primary">
                                        {{ $item['kebutuhan'] }} Unit
                                    </strong>
                                @else
                                    <span class="text-success">0 Unit</span>
                                @endif
                            </td>

                            <td>
                                @if ($item['status'] == 'Habis')
                                    <span class="badge bg-danger">Habis</span>
                                @elseif ($item['status'] == 'Menipis')
                                    <span class="badge bg-warning text-dark">Menipis</span>
                                @else
                                    <span class="badge bg-success">Aman</span>
                                @endif
                            </td>

                            <td>
                                Rp {{ number_format($item['estimasi_biaya'], 0, ',', '.') }}
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class="text-center text-muted">
                                Tidak ada data untuk dianalisis.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@if (count($dataTidakValid) > 0)

    <div class="card border-0 shadow-sm border-start border-danger border-4 mb-4">
        <div class="card-body">

            <h5 class="text-danger">⚠️ Data Tidak Valid</h5>

            <p class="text-muted">
                Beberapa barang tidak dapat diproses karena terdapat kesalahan data.
            </p>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Alasan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($dataTidakValid as $item)
                            <tr>
                                <td>{{ $item['kode'] }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td class="text-danger">
                                    {{ $item['alasan_invalid'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

@endif

<div class="d-flex gap-2 flex-wrap">

    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
        ← Dashboard
    </a>

    <a href="{{ route('analisis.rekomendasi') }}" class="btn btn-primary">
        Lihat Rekomendasi Pengadaan →
    </a>

</div>

@endsection
