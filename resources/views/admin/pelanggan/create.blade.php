@extends('dashboard.layouts.main')
@section('konten')
    <div class="card ">
        <h5 class="card-header">Masukkan Data Pelanggan</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('pelanggan.store') }}">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="basic-default-company"
                            placeholder="Masukkan Username" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="Masukkan Password" aria-describedby="password" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="number">No. Listrik</label>
                    <div class="col-sm-10">
                        <input type="number" name="nomor_kwh" id="number" class="form-control phone-mask"
                            placeholder="Masukkan No. Listrik" aria-describedby="number" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama Pelanggan</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="nama" class="form-control phone-mask"
                            placeholder="Masukkan Nama Lengkap" aria-describedby="nama" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat" id="alamat" class="form-control phone-mask"
                            placeholder="Masukkan Alamat" aria-describedby="nama" />
                    </div>
                </div>

                {{-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Kode Tarif</label>
                    <div class="col-sm-10">
                        <select name="id_tarif" class="form-control">
                            <option>-- Pilih Kode Tarif --</option>
                            <option>R-01/900VA</option>
                            <option>R-02/500VA</option>
                            <option>R-03/250VA</option>
                        </select>
                    </div>
                </div> --}}

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
