
@extends('layouts.app')

@section('title', 'Rekomendasi Pengadaan - Inventory UMKM')

@section('heading', 'Rekomendasi Pengadaan Barang')

@section('content')

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <h5>💡 Rekomendasi Pengadaan</h5>
        <p class="text-muted">
            Daftar barang yang perlu ditambah berdasarkan target stok
            dan tingkat prioritas persediaan.
        </p>

        <div class="row g-3 mt-2">
            <div class="col-md-6">
                <div class="bg-light rounded p-3">
                    <small class="text-muted">Total Barang Direkomendasikan</small>
                    <h3 class="fw-bold text-primary">
                        {{ count($barang) }} Barang
                    </h3>
                </div>
            </div>

            <div class="col-md-6">
                <div class="bg-light rounded p-3">
                    <small class="text-muted">Total Estimasi Biaya</small>
                    <h3 class="fw-bold text-success">
                        Rp {{ number_format($totalEstimasiBiaya, 0, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">

        <h5 class="mb-3">📋 Daftar Prioritas Pengadaan</h5>

        <p class="text-muted">
            Barang diurutkan berdasarkan prioritas kondisi stok,
            kemudian jumlah kebutuhan terbesar.
        </p>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Prioritas</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Stok Akhir</th>
                        <th>Target Stok</th>
                        <th>Jumlah Pengadaan</th>
                        <th>Harga Satuan</th>
                        <th>Estimasi Biaya</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($barang as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                @if ($item['prioritas'] == 1)
                                    <span class="badge bg-danger">
                                        1 - Sangat Mendesak
                                    </span>
                                @elseif ($item['prioritas'] == 2)
                                    <span class="badge bg-warning text-dark">
                                        2 - Perlu Segera
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        3 - Normal
                                    </span>
                                @endif
                            </td>

                            <td>{{ $item['kode'] }}</td>

                            <td>{{ $item['nama'] }}</td>

                            <td>{{ $item['stok_akhir'] }}</td>

                            <td>{{ $item['stok_target'] }}</td>

                            <td>
                                <strong class="text-primary">
                                    {{ $item['kebutuhan'] }} Unit
                                </strong>
                            </td>

                            <td>
                                Rp {{ number_format($item['harga'], 0, ',', '.') }}
                            </td>

                            <td>
                                <strong>
                                    Rp {{ number_format($item['estimasi_biaya'], 0, ',', '.') }}
                                </strong>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">
                                Tidak ada barang yang perlu dilakukan pengadaan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

                @if (count($barang) > 0)
                    <tfoot class="table-light">
                        <tr>
                            <th colspan="8" class="text-end">
                                Total Estimasi Biaya Pengadaan
                            </th>
                            <th class="text-primary">
                                Rp {{ number_format($totalEstimasiBiaya, 0, ',', '.') }}
                            </th>
                        </tr>
                    </tfoot>
                @endif

            </table>
        </div>

    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">

        <h5>📝 Keterangan Prioritas</h5>

        <p>
            <span class="badge bg-danger">Sangat Mendesak</span>
            Barang dengan stok habis.
        </p>

        <p>
            <span class="badge bg-warning text-dark">Perlu Segera</span>
            Barang dengan stok mencapai atau di bawah batas minimum.
        </p>

        <p class="mb-0">
            <span class="badge bg-success">Normal</span>
            Barang yang stoknya masih aman, tetapi belum mencapai target.
        </p>

    </div>
</div>

<div class="d-flex gap-2 flex-wrap">
    <a href="{{ route('analisis.index') }}" class="btn btn-secondary">
        ← Kembali ke Analisis Stok
    </a>

    <a href="{{ route('dashboard') }}" class="btn btn-primary">
        Dashboard
    </a>
</div>

@endsection
