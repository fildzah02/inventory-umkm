
@extends('layouts.app')

@section('title', 'Data Barang - Inventory UMKM')

@section('heading')
    {{ $judul ?? 'Data Seluruh Barang' }}
@endsection

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <div>
            <h5 class="mb-1">📦 Daftar Barang UMKM</h5>
            <p class="text-muted mb-0">
                Data persediaan seluruh barang yang tersedia.
            </p>
        </div>

        <span class="badge bg-primary fs-6">
            Total {{ count($barang) }} Barang
        </span>
    </div>

    <div class="table-responsive">

        <table class="table table-bordered table-striped table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok Awal</th>
                    <th>Barang Masuk</th>
                    <th>Barang Keluar</th>
                    <th>Stok Akhir</th>
                    <th>Stok Minimum</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($barang as $index => $item)

                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>
                            <strong>{{ $item['kode'] }}</strong>
                        </td>

                        <td>{{ $item['nama'] }}</td>

                        <td>
                            <span class="badge bg-secondary">
                                {{ $item['kategori'] }}
                            </span>
                        </td>

                        <td>{{ $item['stok_awal'] }}</td>

                        <td class="text-success">
                            +{{ $item['barang_masuk'] }}
                        </td>

                        <td class="text-danger">
                            -{{ $item['barang_keluar'] }}
                        </td>

                        <td>
                            <strong>{{ $item['stok_akhir'] }}</strong>
                        </td>

                        <td>{{ $item['stok_minimum'] }}</td>

                        <td>
                            @if ($item['stok_akhir'] == 0)
                                <span class="badge bg-danger">Habis</span>
                            @elseif ($item['stok_akhir'] <= $item['stok_minimum'])
                                <span class="badge bg-warning text-dark">Menipis</span>
                            @else
                                <span class="badge bg-success">Aman</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('barang.detail', $item['id']) }}"
                               class="btn btn-sm btn-primary">
                                Detail
                            </a>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="11" class="text-center text-muted">
                            Belum ada data barang.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            ← Kembali ke Dashboard
        </a>
    </div>

</div>

@endsection
