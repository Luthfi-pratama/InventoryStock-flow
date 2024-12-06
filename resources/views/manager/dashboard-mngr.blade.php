@extends('layouts.app')

@section('title', 'Dashboard MANAGER')

@section('sidebar-links')
<li class="nav-item">
    <a href="{{ route('manager.dashboard-mngr') }}" class="nav-link active text-white">
        <i class="fas fa-tachometer-alt me-2"></i> Stock
    </a>
</li>
<li>
    <a href="#" class="nav-link text-white">
        <i class="fas fa-chart-line me-2"></i> Laporan
    </a>
</li>
<li>
    <a href="#" class="nav-link text-white">
        <i class="fas fa-users me-2"></i> Pengguna
    </a>
</li>
<hr>
<div>
    <a href="#" class="btn btn-outline-light w-100">Logout</a>
</div>
@endsection

@section('header', 'Selamat Datang MANAGER!')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h3>REKAP BARANG MASUK</h3>


        <form action="{{ route('manager.dashboard-mngr') }}" method="GET" class="mb-3">
            <label for="range" class="form-label">Pilih Rentang Waktu:</label>
            <select name="range" id="range" class="form-select" onchange="this.form.submit()">
                <option value="today" {{ $range === 'today' ? 'selected' : '' }}>Hari Ini</option>
                <option value="thisWeek" {{ $range === 'thisWeek' ? 'selected' : '' }}>Minggu Ini</option>
                <option value="thisMonth" {{ $range === 'thisMonth' ? 'selected' : '' }}>Bulan Ini</option>
            </select>
        </form>

        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>{{ $item->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection