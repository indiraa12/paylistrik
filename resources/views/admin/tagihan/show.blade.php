@extends('dashboard.layouts.main')
@section('konten')
    <div class="card ">
        <h5 class="card-header">Data Tagihan Listrik <b class="text-capitalize">{{ $tagihan->user->name }}</b> pada bulan <b
                class="text-capitalize">{{ $tagihan->bulan->translatedFormat('F') }}</b></h5>
        <div class="card-body">
            {{-- <small class="text-light fw-semibold">Description list alignment</small> --}}
            <div class="d-flex">
                <dl class="row mt-2">
                    <dt class="col-sm-5">Nama :</dt>
                    <dd class="col-sm-7">{{ $tagihan->user->name }}</dd>
                    <dt class="col-sm-5">Bulan tagihan :</dt>
                    <dd class="col-sm-7 text-capitalize">{{ $tagihan->bulan->translatedFormat('F') }}</dd>
                    <dt class="col-sm-5">Total tagihan :</dt>
                    <dd class="col-sm-7">@rupiah($tagihan->jumlah_meter * $tagihan->user->tarif->tarif_kwh)</dd>
                    <dt class="col-sm-5 text-truncate">Tanggal tagihan dibuat :</dt>
                    <dd class="col-sm-7">
                        {{ $tagihan->created_at->translatedFormat('d F, Y') }}
                    </dd>
                    <dt class="col-sm-5">Status pembayaran :</dt>
                    <dd class="col-sm-7">
                        @if ($tagihan->status == 'Belum Bayar')
                            <div class="badge bg-label-warning">Belum Bayar</div>
                        @else
                            <div class="badge bg-label-success">Lunas</div>
                        @endif
                    </dd>
                </dl>
                <dl class="row mt-2">
                    <dt class="col-sm-5 text-truncate">Nomor kwh :</dt>
                    <dd class="col-sm-7"> {{ $tagihan->user->nomor_kwh }}</dd>
                    <dt class="col-sm-5">Meter awal :</dt>
                    <dd class="col-sm-7">{{ $tagihan->penggunaan->meter_awal }}</dd>
                    <dt class="col-sm-5">Meter ahir :</dt>
                    <dd class="col-sm-7 text-capitalize">{{ $tagihan->penggunaan->meter_akhir }}</dd>
                    <dt class="col-sm-5">Total meter :</dt>
                    <dd class="col-sm-7">{{ $tagihan->jumlah_meter }}</dd>
                    <dt class="col-sm-5">Update terbaru :</dt>
                    <dd class="col-sm-7">
                        {{ $tagihan->updated_at->translatedFormat('d F, Y | H:i:s ') }}
                    </dd>
                </dl>
            </div>
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
