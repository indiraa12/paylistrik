@extends('dashboard/layouts/main')
@section('konten')
    <!-- Bordered Table -->
    <div class="card">
        <h5 class="card-header" align="center">Detail Tagihan</h5>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="mb-3"></div>
            <table class="table table-striped table-hover">
                <tr>
                    <td align="left">Nama</td>
                    <td width="5%">: {{ $penggunaan->User->name }}</td>
                </tr>
                <tr>
                    <td align="left">Bulan</td>
                    <td width="5%">: {{ $penggunaan->bulan }}</td>
                </tr>
                <tr>
                    <td align="left">Tahun</td>
                    <td width="5%">: {{ $penggunaan->tahun }}</td>
                </tr>
                <tr>
                    <td align="left">Jumlah Tagihan</td>
                    <td width="80%">:
                        {{ $total }}
                    </td>
                </tr>
                {{-- <tr>
                    <td align="left">Status</td>
                    <td width="%">: <span class="badge bg-warning">Belum Bayar</span></td>
                </tr> --}}
            </table>

            <div class="mb-3"></div>
            @if ($penggunaan->status == 'Belum Bayar' || $penggunaan->TagihanPelanggan == null)
                <form onsubmit="return confirm('apakah ada yakin ingin membuat tagihan {{ $penggunaan->User->name }}')"
                    action="{{ route('tagihan.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="penggunaan_id" value="{{ $penggunaan->id }}">
                    <button type="submit" class="btn btn-primary">Buat Tagihan</button>
                </form>
            @else
                <div class='form-text'>
                    Tagihan Sudah Dibuat, Silahkan Cek Daftar <a href="{{ url('/halaman/tagihan') }}"
                        class="badge bg-label-success">Tagihan</a>
                </div>
            @endif

        </div>
        <!--/ Bordered Table -->

    </div>
    <!--Modal Akhir-->
@endsection
