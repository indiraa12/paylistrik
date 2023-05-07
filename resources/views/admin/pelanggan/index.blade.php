@extends('dashboard/layouts/main')
@section('konten')
    <!-- Bordered Table -->

    <div class="card ">
        <h5 class="card-header">Daftar Pelanggan</h5>
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

            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
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
                            <th>ID</th>
                            <th>Username</th>
                            <th>Nama Pelanggan</th>
                            <th>No. Listrik</th>
                            <th>Alamat</th>
                            {{-- <th>Kode Tarif</th> --}}
                            @if (Auth::user()->role_id == 1)
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>

                    @foreach ($data_pelanggan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['username'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['nomor_kwh'] }}</td>
                            <td>{{ $item['alamat'] }}</td>
                            {{-- <td>{{ $item['id_tarif'] }}</td> --}}
                            @if (Auth::user()->role_id == 1)
                                <td>
                                    <a href="{{ route('pelanggan.edit', $item->id) }}" class="badge bg-warning"><i
                                            class="menu-icon tf-icons bx bxs-edit"></i></a>
                                    <form onsubmit="return confirm('apakah anda yakin?')"
                                        action="{{ route('pelanggan.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-danger border-0"><i
                                                class="menu-icon tf-icons bx bxs-trash"></i></button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->

    <!-- / Content -->
@endsection
