@extends('dashboard/layouts/main')
@section('konten')
     <!-- Bordered Table -->
     
     <div class="card ">
        <h5 class="card-header">Daftar Penggunaan</h5>
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

          <a href="{{ route('penggunaan.create') }}" class="btn btn-primary" >Tambah Penggunaan</a>
          <div class="mb-3"></div>
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID Penggunaan</th>
                  <th>Nama</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Meter Awal</th>
                  <th>Meter Akhir </th>
                  <th>Opsi</th>
                </tr>
              </thead>

              @foreach ($data_penggunaan as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->User->name }}</td>
                <td>{{ $item['bulan'] }}</td>
                <td>{{ $item['tahun'] }}</td>
                <td>{{ $item['meter_awal'] }}</td>
                <td>{{ $item['meter_akhir'] }}</td>
                <td>
                  <a href="{{ route('penggunaan.show', $item->id) }}" class="badge bg-success"><i class='bx bx-detail'></i></i></a>
                  <a href="{{ route('penggunaan.edit', $item->id) }}" class="badge bg-warning"><i class='bx bx-edit'></i></i></a>
                  <form action="/admin/penggunaan/{{ $item->id }}" onsubmit="return confirm('apakah anda yakin?')" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="badge bg-danger border-0"><i class=" bx bx-trash"></i></button>
                  </form>
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