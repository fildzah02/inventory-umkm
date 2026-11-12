
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Inventory UMKM')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f4f6fa;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #172554;
            color: white;
            padding: 24px 15px;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
            padding: 10px;
            margin-bottom: 25px;
        }

        .sidebar a {
            display: block;
            color: #dbeafe;
            text-decoration: none;
            padding: 12px 14px;
            margin-bottom: 5px;
            border-radius: 8px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #2563eb;
            color: white;
        }

        .menu-label {
            color: #93c5fd;
            font-size: 11px;
            font-weight: bold;
            margin: 20px 10px 8px;
            text-transform: uppercase;
        }

        .main-content {
            margin-left: 250px;
            padding: 25px;
        }

        .topbar {
            background: white;
            padding: 18px 22px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.04);
        }

        .content-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                min-height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <aside class="sidebar">
        <div class="brand">
            📦 Inventory UMKM
        </div>

        <div class="menu-label">Menu Utama</div>

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('barang.index') }}"
           class="{{ request()->routeIs('barang.index') ? 'active' : '' }}">
            📦 Data Barang
        </a>

        <div class="menu-label">Kategori Barang</div>

        <a href="{{ route('barang.kategori', 'Makanan') }}">
            🍚 Makanan
        </a>

        <a href="{{ route('barang.kategori', 'Minuman') }}">
            🥤 Minuman
        </a>

        <a href="{{ route('barang.kategori', 'Perlengkapan') }}">
            🧴 Perlengkapan
        </a>

        <div class="menu-label">Pengelolaan Stok</div>

        <a href="{{ route('barang.stok-rendah') }}">
            ⚠️ Stok Rendah
        </a>

        <a href="{{ route('analisis.index') }}"
           class="{{ request()->routeIs('analisis.index') ? 'active' : '' }}">
            📊 Analisis Stok
        </a>

        <a href="{{ route('analisis.rekomendasi') }}"
           class="{{ request()->routeIs('analisis.rekomendasi') ? 'active' : '' }}">
            💡 Rekomendasi Pengadaan
        </a>
    </aside>

    <main class="main-content">

        <header class="topbar">
            <h4 class="mb-1">@yield('heading', 'Dashboard')</h4>
            <small class="text-muted">
                Sistem Informasi Pengelolaan Persediaan Barang UMKM
            </small>
        </header>

        @yield('content')

        <footer class="text-center text-muted mt-4">
            <small>Inventory UMKM &copy; {{ date('Y') }}</small>
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>
