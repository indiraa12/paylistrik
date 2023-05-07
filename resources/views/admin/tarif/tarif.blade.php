@extends('dashboard/layouts/main')
@section('konten')
    <!-- Bordered Table -->
    <div class="card ">
        <h5 class="card-header">Daftar Tarif</h5>
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

            <a href="{{ route('tarif.create') }}" class="btn btn-primary">Tambah Tarif</a>
            <div class="mb-3"></div>

            <div class="mb-3">
                <div class="input-group">
                    <div class="col-sm-5">
                        <form action="/admin/pelanggan" method="GET">
                            <input type="text" class="form-control" name="cari" placeholder="Cari Apaa..">
                    </div>
                    <button class="btn btn-primary" type="submit" id="button-addon2"><i
                            class='bx bx-search-alt-2'></i></button>
                    </form>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            {{-- <th>ID Tarif</th> --}}
                            <th>Daya</th>
                            <th>Tarif perkwh</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    @foreach ($data_tarif as $item)
                        <tr>
                            {{-- <td>{{ $item['id_tarif'] }}</td> --}}
                            <td>{{ $item['daya'] }}</td>
                            <td>Rp.{{ $item['tarif_kwh'] }}</td>
                            <td>
                                <a href="/admin/pelanggan/edit/{{ $item->id_pelanggan }}" class="badge bg-warning"><i
                                        class="menu-icon tf-icons bx bxs-edit"></i></a>
                                <form action="/admin/pelanggan/{{ $item->id_pelanggan }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge bg-danger border-0"><i
                                            class="menu-icon tf-icons bx bxs-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
