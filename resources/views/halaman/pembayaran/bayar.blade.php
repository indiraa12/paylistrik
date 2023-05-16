@extends('dashboard/layouts/main')
@section('konten')
              <!-- Bordered Table -->
     <div class="card">
      <h5 class="card-header">Rincian Pembayaran</h5>
      <div class="card-body">    
    <div class="mb-3">
				<form>
				  <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-name">Nama Pelanggan</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control"  name="nama_pelanggan" id="basic-default-name" />
					</div>
				  </div>
				  <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-company">Tagihan</label>
					<div class="col-sm-10">
					  <input
						type="text"
						class="form-control"
						id="basic-default-company"
						
					  />
					</div>
				  </div>
				  <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-company">ID Pelanggan</label>
					<div class="col-sm-10">
					  <input
						type="text"
						class="form-control"
						id="basic-default-company"
					  />
					</div>
				  </div>
				  <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-phone">Tanggal Pembayaran</label>
					<div class="col-sm-10">
					  <input
						type="text"
						id="basic-default-phone"
						class="form-control phone-mask"
						aria-describedby="basic-default-phone"
					  />
					</div>
				  </div>
				  <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-message">Bulan Bayar</label>
					<div class="col-sm-10">
						<input
						type="text"
						id="basic-default-phone"
						class="form-control phone-mask"
						aria-describedby="basic-default-phone"
					  />
					</div>
				  </div>
				  <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-message">Biaya Admin</label>
					<div class="col-sm-10">
						<input
						type="text"
						id="basic-default-phone"
						class="form-control phone-mask"
						aria-describedby="basic-default-phone"
					  />
					</div>
				  </div>
				  <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-phone">Total Pembayaran</label>
					<div class="col-sm-10">
					  <input
						type="text"
						id="basic-default-phone"
						class="form-control phone-mask"
						aria-describedby="basic-default-phone"
					  />
					</div>
				  </div>
				  <div class="row mb-3">
					<label class="col-sm-2 col-form-label" for="basic-default-phone">Nama Admin</label>
					<div class="col-sm-10">
					  <input
						type="text"
						id="basic-default-phone"
						class="form-control phone-mask"
						aria-describedby="basic-default-phone"
					  />
					</div>
				  </div>
				  <div class="row justify-content-end">
					<div class="col-sm-10">
					  <button type="submit" class="btn btn-primary">Send</button>
					</div>
				  </div>
    <!--/ Bordered Table -->
</div>
      </div>
          <!--Modal Akhir-->


@endsection