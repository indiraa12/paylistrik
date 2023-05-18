@extends('dashboard/layouts/main')
@section('konten')
    <!-- Bordered Table -->

    <div class="card ">
        <h5 class="card-header" align="center">Rincian Pembayaran</h5>
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
                            <th>Nama pengguna</th>
                            <th>Nomer Kwh</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Jumlah Meter</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal di buat</th>
                            <th>Terakhir di update</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    @foreach ($tagihan as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->nomor_kwh }}</td>
                            <td>{{ $item->bulan }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->jumlah_meter }}</td>
                            <td>@rupiah($item->jumlah_meter * $item->user->tarif->tarif_kwh)</td>
                            <td>
                                @if ($item->status == 'Belum Bayar')
                                    <div class="badge bg-label-warning">Belum Bayar</div>
                                @else
                                    <div class="badge bg-label-success">Lunas</div>
                                @endif
                            </td>
                            <td>{{ $item->created_at->format('d, M Y') }}</td>
                            <td>{{ $item->updated_at->format('d, M Y | H:i:s') }}</td>
                            <td>
                                @if ($item->status == 'Belum Bayar')
                                    <a href="{{ route('tagihan.show', $item->id) }}" class="btn btn-primary btn-sm">
                                        Bayar Tagihan
                                    </a>
                                @else
                                    <a href="{{ route('tagihan.show', $item->id) }}" class="btn btn-success btn-sm">
                                        Detail Tagihan
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->

    <!-- / Content -->
@endsection
