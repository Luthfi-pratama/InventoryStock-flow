@extends('layouts.app')

@section('title', 'Master Data SPV')

@section('sidebar-links')
<li class="nav-item">
    <a class="nav-link active" href="{{ route('spv.dashboard') }}">
        <i class="fa-solid fa-check"></i> Stock
    </a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="{{ route('spv.master') }}">
        <i class="fa-brands fa-dropbox"></i> Master Data
    </a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="{{ route('spv.supplier') }}">
        <i class="fa-solid fa-truck"></i> Supplier/PT
    </a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="{{ route('spv.category') }}">
        <i class="fa-solid fa-store"></i> Category
    </a>
</li>
<hr>
<div>
    <a href="#" class="btn btn-outline-light w-100">Logout</a>
</div>
@endsection

@section('header', 'DASHBOARD SPV')

@section('content')

<!-- Modal for Add Supplier -->
<div class="modal fade" id="createDataModal" tabindex="-1" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Tambah Kategori Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('spv.addCategory') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="supplier_name" class="form-label">Nama Category:</label>
                        <input type="text" name="name" id="supplier_name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tombol Tambah Data -->
<div class="card shadow-lg p-4">
    <h3 class="mb-3">Daftar Category</h3>
    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nama Supplier</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ route('spv.category.destroy', $category->id) }}" method="POST"
                        style="display:inline-block;"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-success mt-5" data-bs-toggle="modal" data-bs-target="#createDataModal">
        Tambah Category
    </button>
</div>
@endsection

<!-- Section Alert Javascript-->
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if(Session::has('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ Session::get('success') }}",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif
@endsection