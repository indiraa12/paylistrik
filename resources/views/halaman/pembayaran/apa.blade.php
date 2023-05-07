@extends('dashboard/layouts/main')
@section('konten')
     <!-- Bordered Table -->
     
     <div class="card ">
        <h5 class="card-header">Daftar Pelanggan</h5>
        <div class="card-body">
          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          
          @endif
          @if(session()->has('berhasil'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session()->has('hapus'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('hapus') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <a href="{{ route('pembayaran.create') }}" class="btn btn-primary" >Tambah Pembayaran</a>
          <div class="mb-3"></div>
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID Pembayaran</th>
                  <th>ID Tagihan</th>
                  <th>ID Pelanggan</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Bulan Bayar</th>
                  <th>Biaya Admin</th>
                  <th>Total Bayar</th>
                  <th>ID Admin</th>
                  <th>Opsi</th>
                </tr>
              </thead>

              {{-- @foreach ($data_pelanggan as $item)
              <tr>
                <td>{{ $item['id_pelanggan'] }}</td>
                <td>{{ $item['username'] }}</td>
                <td>{{ $item['password'] }}</td>
                <td>{{ $item['nomor_kwh'] }}</td>
                <td>{{ $item['nama_pelanggan'] }}</td>
                <td>{{ $item['alamat'] }}</td>
                <td>{{ $item['id_tarif'] }}</td>
                <td>
                 <a href="/admin/pelanggan/edit/{{ $item->id_pelanggan }}" class="badge bg-warning"><i class="menu-icon tf-icons bx bxs-edit"></i></a>
                  <form action="/admin/pelanggan/{{ $item->id_pelanggan }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="badge bg-danger border-0"><i class="menu-icon tf-icons bx bxs-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach --}}

            </table>
          </div>
        </div>
      </div>
      <!--/ Bordered Table -->
 
  <!-- / Content -->
@endsection