@extends('dashboard.layouts.main')
@section('konten')
<div class="card ">
    <h5 class="card-header">Masukkan Data Pelanggan</h5>
    <div class="card-body">
        <form method="POST" action="{{ route('penggunaan.store') }}">
           @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="user_id">Nama</label>
                <div class="col-sm-10">
              <select name="user_id"  class="form-control" required >
                  @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Bulan</label>
                <div class="col-sm-10">
                <input type="text" name="bulan" class="form-control" id="basic-default-company" placeholder="Masukkan Username"/>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="tahun">Tahun</label>
              <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                  <input type="text" id="tahun" class="form-control" name="tahun" placeholder="Masukkan bulan bayar"   aria-describedby="tahun"/>
                </div>
              </div>
           </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="number">Meter Awal</label>
                <div class="col-sm-10">
                <input type="number" name="meter_awal" id="number" class="form-control phone-mask" placeholder="Masukkan No. Listrik"  aria-describedby="number" />
              </div>
          </div>
                                  
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="nama"> Meter Akhir</label>
                <div class="col-sm-10">
              <input type="text" name="meter_akhir" id="nama" class="form-control phone-mask" placeholder="Masukkan Nama Lengkap" aria-describedby="nama" />
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