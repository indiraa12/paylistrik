@extends('dashboard.layouts.main')
@section('konten')
    <div class="card ">
        <h5 class="card-header">Data Tagihan pada bulan </h5>
        <div class="card-body">
            {{-- <small class="text-light fw-semibold">Description list alignment</small> --}}
            <dl class="row mt-2">
                <dt class="col-sm-3">Description lists</dt>
                <dd class="col-sm-9">A description list is perfect for defining terms.</dd>

                <dt class="col-sm-3">Euismod</dt>
                <dd class="col-sm-9">
                    <p>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</p>
                </dd>

                <dt class="col-sm-3">Malesuada porta</dt>
                <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>

                <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
                <dd class="col-sm-9">
                    Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum.
                </dd>

                <dt class="col-sm-3">Nesting</dt>
                <dd class="col-sm-9">
                    <dl class="row">
                        <dt class="col-sm-4">Nested definition list</dt>
                        <dd class="col-sm-8">
                            Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.
                        </dd>
                    </dl>
                </dd>
            </dl>
        </div>
        <hr class="m-0" />
        <div class="card-body">
            <form method="POST" action="/admin/tagihan-admin">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="penggunaan">ID Tagihan</label>
                    <div class="col-sm-4">
                        <input type="text" name="id_tagihan" class="form-control" id="id_tagihan" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">ID Penggunaan</label>
                    <div class="col-sm-10">
                        <select name="id_penggunaan" class="form-control" required>
                            {{-- @foreach ($data as $item)
                                <option>{{ $item->id_penggunaan }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">ID Pelanggan</label>
                    <div class="col-sm-10">
                        <select name="id_pelanggan" class="form-control" required>
                            {{-- @foreach ($pelanggan as $item)
                                <option>{{ $item->id_pelanggan }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Bulan</label>
                    <div class="col-sm-10">
                        <input type="text" name="bulan" class="form-control" id="basic-default-company"
                            placeholder="Masukkan Username" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tahun">Tahun</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" id="tahun" class="form-control" name="tahun"
                                placeholder="Masukkan bulan bayar" aria-describedby="tahun" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="number">Jumlah Meter</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah_meter" id="number" class="form-control phone-mask"
                            placeholder="Masukkan No. Listrik" aria-describedby="number" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Status</label>
                    <div class="col-sm-10">
                        <input type="text" name="status" id="nama" class="form-control phone-mask"
                            placeholder="Masukkan Nama Lengkap" aria-describedby="nama" />
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
