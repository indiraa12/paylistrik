@extends('dashboard/layouts/main')
@section('konten')
     <!-- Bordered Table -->
     
     <div class="card ">
        <h5 class="card-header" align="center">Daftar Data Tagihan</h5>
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
          
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID Tagihan</th>
                  <th>ID Penggunaan</th>
                  <th>ID Pelanggan</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Jumlah Meter</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>

              {{-- @foreach ($tagih as $item)
              <tr>
                <td>{{ $item['id_tagihan'] }}</td>
                <td>{{ $item['id_penggunaan'] }}</td>
                <td>{{ $item['id_pelanggan'] }}</td>
                <td>{{ $item['bulan'] }}</td>
                <td>{{ $item['tahun'] }}</td>
                <td>{{ $item['jumlah_meter'] }}</td>
                <td>{{ $item['status'] }}</td>
                <td>
                 <form action="/admin/tagihan-admin/{{ $item->id_tagihan }}" method="POST" class="d-inline">
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