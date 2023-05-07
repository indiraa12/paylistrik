@extends('dashboard/layouts/main')
@section('konten')
      <!-- Bordered Table -->
      <div class="card">
        <h5 class="card-header" align="center">Detail Tagihan</h5>
        <div class="card-body">
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
                          <td width="5%">: {{ $penggunaan->meter_akhir - $penggunaan->meter_awal }}</td>
                        </tr>
                        <tr>
                          <td align="left">Status</td>
                          <td width="80%">: <span class="badge bg-warning">Belum Bayar</span></td>
                        </tr>
                      </table>
                      
                      <div class="mb-3"></div>
                      <button type="submit" class="btn btn-primary">Kirim Tagihan</button>
       
      </div>
      <!--/ Bordered Table -->
  
        </div>
            <!--Modal Akhir-->
@endsection

