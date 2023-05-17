@extends('dashboard.layouts.main')
@section('konten')
    <div class="card ">
        <h5 class="card-header">Data Tagihan Listrik <b class="text-capitalize">{{ $tagihan->user->name }}</b> pada bulan <b
                class="text-capitalize">{{ $tagihan->bulan->translatedFormat('F') }}</b></h5>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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
        @if ($tagihan->status == 'Lunas')
            <div class='text-secondary text-center my-4'>Tagihan Listrik
                <b>{{ $tagihan->user->name }}</b>
                sudah
                <span class="badge bg-label-success">Lunas</span>, pada tanggal
                {{ $tagihan->updated_at->translatedFormat('d F Y') }},
                silahkan
                cetak bukti
                <span class="text-decoration-underline">pembayaran.</span>
            </div>
        @else
            <h5 class="card-header">Form Pembayaran Tagihan Listrik</h5>
            <div class="card-body">
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @foreach ($errors->all() as $item)
                    {{ $item }}
                @endforeach
                <form onsubmit="return confirm('apakah anda yakin?')" method="POST"
                    action="{{ route('pembayaran.store') }}">
                    @csrf
                    <input type="hidden" name="tagihan_id" value="{{ $tagihan->id }}">
                    {{-- <input type="hidden" name="user_id" value="{{ $tagihan->user->id }}"> --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Tanggal Pembayaran</label>
                        <div class="col-sm-10">
                            <input type="date" value="{{ carbon\carbon::now()->translatedFormat('Y-m-d') }}"
                                name="tanggal_pembayaran" class="form-control" id="basic-default-company"
                                placeholder="Masukkan Username" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="tahun">Total Bayar</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="number" id="tahun" class="form-control" name="total_bayar"
                                    placeholder="Masukkan bulan bayar" aria-describedby="tahun" />
                            </div>
                            <div class="form-text text-dark">Tagihan <b>{{ $tagihan->penggunaan->user->name }}</b> bulan
                                ini
                                @rupiah($tagihan->jumlah_meter * $tagihan->user->tarif->tarif_kwh) + biaya admin Rp.
                                2500 =
                                <b>@rupiah($tagihan->jumlah_meter * $tagihan->user->tarif->tarif_kwh + 2500)</b>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
