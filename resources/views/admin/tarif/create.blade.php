@extends('dashboard.layouts.main')
@section('konten')
<div class="card ">
    <h5 class="card-header">Masukkan Tarif</h5>
    <div class="card-body">
      <form method="POST" action="{{ route('tarif.store') }}">
         @csrf
  <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="number">Daya</label>
            <div class="col-sm-10">
              <input type="text" name="daya" id="number" class="form-control phone-mask" placeholder="Masukkan Daya" aria-describedby="number" />
            </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="nama">Tarif Perkwh</label>
            <div class="col-sm-10">
              <input type="text" name="tarif_kwh"  id="nama" class="form-control phone-mask" placeholder="Masukkan Nama Lengkap"  aria-describedby="nama" />
            </div>
        </div>
  
        <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </div>
      </form>                          
    </div>
</div>
@endsection