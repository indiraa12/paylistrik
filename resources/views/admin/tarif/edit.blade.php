@extends('dashboard.layouts.main')
@section('konten')
<div class="card ">
    <h5 class="card-header">Edit Tarif</h5>
    <div class="card-body">
      <form method="POST" action="{{ route('tarif.update', $data_tarif->id) }}">
         @csrf
  <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="number">Daya</label>
            <div class="col-sm-10">
              <input type="text" name="daya" value="{{ $data_tarif->daya }}" id="number" class="form-control phone-mask" placeholder="Masukkan Daya" aria-describedby="number" />
            </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="nama">Tarif Perkwh</label>
            <div class="col-sm-10">
              <input type="text" name="tarifperkwh" value="{{ $data_tarif->tarifperkwh }}"  id="nama" class="form-control phone-mask" placeholder="Masukkan Nama Lengkap"  aria-describedby="nama" />
            </div>
        </div>
  
        <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">EDIT</button>
          </div>
        </div>
      </form>                          
    </div>
</div>
@endsection