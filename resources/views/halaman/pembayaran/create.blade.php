@extends('dashboard.layouts.main')
@section('konten')
<div class="card ">
    <h5 class="card-header">Masukkan Data Pelanggan</h5>
    <div class="card-body">
        <form method="POST" action="/halaman/pembayaran">
           @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="pelanggan">ID Pembayaran</label>
                <div class="col-sm-4">
                  <input type="text" name="id_pembayaran" class="form-control"   id="id_pembayaran"  />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="alamat">ID Pelanggan</label>
                  <div class="col-sm-10">
                   <select name="id_pelanggan" class="form-control" required >
                 
                      @foreach ($data as $item)
                      <option>{{ $item->id_pelanggan }}</option>
                      @endforeach
                     
                    </select>
                  </div>
                </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Pembayaran</label>
                <div class="col-sm-10">
                <input type="date" name="tanggal_pembayaran" class="form-control" id="basic-default-company" placeholder="Masukkan Username"/>
              </div>
             </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="bulan_bayar">Bulan Bayar</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
            <input type="text" id="bulan_bayar" class="form-control" name="bulan_bayar"
                placeholder="Masukkan bulan bayar"   aria-describedby="bulan_bayar"/>
            </div>
                                    </div>
                                  </div>

                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="number">Biaya Admin</label>
                                    <div class="col-sm-10">
                                      <input
                                        type="number" name="biaya_admin"
                                        id="number"
                                        class="form-control phone-mask"
                                        placeholder="Masukkan No. Listrik"
                                        aria-describedby="number"
                                      />
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="nama">Total Bayar</label>
                                    <div class="col-sm-10">
                                      <input
                                        type="text" name="total_bayar"
                                        id="nama"
                                        class="form-control phone-mask"
                                        placeholder="Masukkan Nama Lengkap"
                                        aria-describedby="nama"
                                      />
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="alamat">ID Admin</label>
                                    <div class="col-sm-10">
                                      <input
                                        type="text" name="id_admin"
                                        id="id_admin"
                                        class="form-control phone-mask"
                                        placeholder="Masukkan Alamat"
                                        aria-describedby="nama"
                                      />
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