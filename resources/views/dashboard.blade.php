
@extends('layouts.app')

@section('title', 'Dashboard Inventory UMKM')

@section('heading', 'Dashboard Utama')

@section('content')

<div class="row g-3 mb-4">

    @foreach ($ringkasan as $item)
        <div class="col-md-6 col-xl">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h4>{{ $item['ikon'] }}</h4>

                    <p class="text-muted mb-1">
                        {{ $item['judul'] }}
                    </p>

                    <h3 class="fw-bold text-{{ $item['warna'] }}">
                        {{ number_format($item['nilai']) }}
                    </h3>
                </div>
            </div>
        </div>
    @endforeach

</div>

<div class="content-card mb-4">
    <h5>💰 Total Nilai Persediaan</h5>

    <h3 class="text-primary fw-bold mb-0">
        Rp {{ number_format($totalNilaiPersediaan, 0, ',', '.') }}
    </h3>
</div>

<div class="content-card">

    <h5 class="mb-3">📦 Daftar Barang</h5>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok Awal</th>
                    <th>Barang Masuk</th>
                    <th>Barang Keluar</th>
                    <th>Stok Akhir</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($barang as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['kode'] }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>{{ $item['stok_awal'] }}</td>
                        <td>{{ $item['barang_masuk'] }}</td>
                        <td>{{ $item['barang_keluar'] }}</td>
                        <td>{{ $item['stok_akhir'] }}</td>

                        <td>
                            @if ($item['stok_akhir'] == 0)
                                <span class="badge bg-danger">Habis</span>
                            @elseif ($item['stok_akhir'] <= $item['stok_minimum'])
                                <span class="badge bg-warning text-dark">Menipis</span>
                            @else
                                <span class="badge bg-success">Aman</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

@endsection
