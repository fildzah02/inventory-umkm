
@extends('layouts.app')

@section('title', 'Detail Barang - Inventory UMKM')

@section('heading', 'Detail Barang')

@section('content')

@php
    $stok = $barang['stok_akhir'];

    if ($stok == 0) {
        $status = 'Habis';
        $warna = 'danger';
    } elseif ($stok <= $barang['stok_minimum']) {
        $status = 'Menipis';
        $warna = 'warning';
    } else {
        $status = 'Aman';
        $warna = 'success';
    }

    $persentase = $barang['stok_target'] > 0
        ? min(100, ($stok / $barang['stok_target']) * 100)
        : 0;
@endphp

<div class="content-card mb-4">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <div>
            <h5 class="mb-1">📦 {{ $barang['nama'] }}</h5>
            <p class="text-muted mb-0">
                Informasi lengkap persediaan barang
            </p>
        </div>

        <span class="badge bg-{{ $warna }} fs-6">
            {{ $status }}
        </span>
    </div>

    <div class="row g-3">

        <div class="col-md-6">
            <div class="border rounded p-3 h-100">
                <small class="text-muted">Kode Barang</small>
                <h5 class="mt-1">{{ $barang['kode'] }}</h5>
            </div>
        </div>

        <div class="col-md-6">
            <div class="border rounded p-3 h-100">
                <small class="text-muted">Nama Barang</small>
                <h5 class="mt-1">{{ $barang['nama'] }}</h5>
            </div>
        </div>

        <div class="col-md-6">
            <div class="border rounded p-3 h-100">
                <small class="text-muted">Kategori</small>
                <h5 class="mt-1">{{ $barang['kategori'] }}</h5>
            </div>
        </div>

        <div class="col-md-6">
            <div class="border rounded p-3 h-100">
                <small class="text-muted">Harga Satuan</small>
                <h5 class="mt-1 text-primary">
                    Rp {{ number_format($barang['harga'], 0, ',', '.') }}
                </h5>
            </div>
        </div>

    </div>

</div>

<div class="content-card mb-4">

    <h5 class="mb-4">📊 Informasi Persediaan</h5>

    <div class="row g-3">

        <div class="col-md-3 col-6">
            <div class="bg-light rounded p-3 text-center">
                <small class="text-muted">Stok Awal</small>
                <h3 class="fw-bold mt-2">
                    {{ $barang['stok_awal'] }}
                </h3>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="bg-light rounded p-3 text-center">
                <small class="text-muted">Barang Masuk</small>
                <h3 class="fw-bold text-success mt-2">
                    +{{ $barang['barang_masuk'] }}
                </h3>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="bg-light rounded p-3 text-center">
                <small class="text-muted">Barang Keluar</small>
                <h3 class="fw-bold text-danger mt-2">
                    -{{ $barang['barang_keluar'] }}
                </h3>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="bg-primary bg-opacity-10 rounded p-3 text-center">
                <small class="text-muted">Stok Akhir</small>
                <h3 class="fw-bold text-primary mt-2">
                    {{ $stok }}
                </h3>
            </div>
        </div>

    </div>

    <hr class="my-4">

    <div class="row g-3">

        <div class="col-md-4">
            <small class="text-muted">Stok Minimum</small>
            <h5>{{ $barang['stok_minimum'] }} unit</h5>
        </div>

        <div class="col-md-4">
            <small class="text-muted">Target Stok</small>
            <h5>{{ $barang['stok_target'] }} unit</h5>
        </div>

        <div class="col-md-4">
            <small class="text-muted">Status Persediaan</small>
            <h5>
                <span class="badge bg-{{ $warna }}">
                    {{ $status }}
                </span>
            </h5>
        </div>

    </div>

    <div class="mt-4">
        <div class="d-flex justify-content-between mb-2">
            <strong>Pencapaian Target Stok</strong>
            <strong>{{ number_format($persentase, 1) }}%</strong>
        </div>

        <div class="progress" style="height: 14px;">
            <div class="progress-bar bg-{{ $warna }}"
                 role="progressbar"
                 style="width: {{ $persentase }}%"
                 aria-valuenow="{{ $persentase }}"
                 aria-valuemin="0"
                 aria-valuemax="100">
            </div>
        </div>
    </div>

</div>

<div class="content-card mb-4">

    <h5>💰 Nilai Persediaan</h5>

    <h3 class="text-primary fw-bold">
        Rp {{ number_format($stok * $barang['harga'], 0, ',', '.') }}
    </h3>

    <small class="text-muted">
        Perhitungan: stok akhir × harga satuan
    </small>

</div>

<div class="d-flex gap-2 flex-wrap">

    <a href="{{ route('barang.index') }}" class="btn btn-secondary">
        ← Kembali ke Data Barang
    </a>

    <a href="{{ route('barang.kategori', $barang['kategori']) }}"
       class="btn btn-primary">
        Lihat Kategori {{ $barang['kategori'] }}
    </a>

</div>

@endsection
