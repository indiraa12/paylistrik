@extends('dashboard/layouts/main')
@section('konten')
    <!-- Bordered Table -->

    <div class="card ">
        <h5 class="card-header" align="center">Daftar Laporan Pembayaran</h5>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('berhasil'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('berhasil') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('hapus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('hapus') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tagihan</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Bulan Bayar</th>
                            <th>Biaya Admin</th>
                            <th>Total Bayar</th>
                            <th>Nama Admin</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->

    <!-- / Content -->
@endsection
