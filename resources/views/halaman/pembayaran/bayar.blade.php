@extends('dashboard/layouts/main')
@section('konten')
              <!-- Bordered Table -->
     <div class="card">
      <h5 class="card-header">Rincian Pembayaran</h5>
      <div class="card-body">
          
    <div class="mb-3"></div>
										<table class="table table-striped table-hover">
											<tr>
												<td align="left">ID Pelanggan</td>
												<td width="80%">:</td>
												<td align="left"></td>
											</tr>
											<tr>
												<td align="left">Bulan Bayar</td>
												<td width="5%">:</td>
												<td align="left"></td>
											</tr>
											<tr>
												<td align="left">Biaya Admin</td>
												<td width="5%">:</td>
												<td align="left"></td>
											</tr>
											<tr>
												<td align="left">Total Bayar</td>
												<td width="5%">:</td>
												<td align="left"></td>
											</tr>
											<tr>
												<td align="left">ID Admin</td>
												<td width="5%">:</td>
												<td align="left"></td>
											</tr>
										</table>
										<div class="mb-3"></div>
										<a href="{{ route('pembayaran.create') }}" class="btn btn-primary" >Bayar Sekarang</a>
                     </div>
      					</div>
    <!--/ Bordered Table -->

      </div>
          <!--Modal Akhir-->


@endsection