
@extends('layouts.app')

@section('title', 'Kategori Barang - Inventory UMKM')

@section('heading')
    Kategori {{ $nama }}
@endsection

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <div>
            <h5>📦 Barang Kategori {{ $nama }}</h5>
            <p class="text-muted mb-0">
                Daftar barang berdasarkan kategori yang dipilih.
            </p>
        </div>

        <span class="badge bg-primary fs-6">
            {{ count($barang) }} Barang
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Stok Awal</th>
                    <th>Barang Masuk</th>
                    <th>Barang Keluar</th>
                    <th>Stok Akhir</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($barang as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['kode'] }}</td>
                        <td>{{ $item['nama'] }}</td>
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
                        <td colspan="9" class="text-center text-muted">
                            Tidak ada barang dalam kategori ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <a href="{{ route('barang.index') }}" class="btn btn-secondary">
        ← Kembali ke Data Barang
    </a>

</div>

@endsection
