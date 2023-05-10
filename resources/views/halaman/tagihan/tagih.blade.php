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
                  <th>ID Penggunaan</th>
                  <th>ID Pelanggan</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Jumlah Meter</th>
                  <th>Status</th>
                </tr>
              </thead>

              @foreach ($tagihan as $item)
              <tr>
                <td>{{ $item['penggunaan_id'] }}</td>
                <td>{{ $item['user_id'] }}</td>
                <td>{{ $item['bulan'] }}</td>
                <td>{{ $item['tahun'] }}</td>
                <td>{{ $item['jumlah_meter'] }}</td>
                <td><a href="{{ route('penggunaan.edit', $item->id) }}" class="badge bg-warning">Bayar</a></td>
                
              </tr>
              @endforeach

            </table>
          </div>
        </div>
      </div>
      <!--/ Bordered Table -->
 
  <!-- / Content -->
@endsection