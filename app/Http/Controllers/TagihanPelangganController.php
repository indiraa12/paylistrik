<?php

namespace App\Http\Controllers;

use App\Models\Penggunaan;
use App\Models\TagihanPelanggan;
use Illuminate\Http\Request;

class TagihanPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagihan = TagihanPelanggan::with('penggunaan','user')->latest()->get();
        // return $tagihan;
        return view('admin.tagihan.index', compact('tagihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penggunaan = Penggunaan::where('id', $request->penggunaan_id)->first();
        $data = $request->all();
        $data['penggunaan_id'] = $request->penggunaan_id;
        $data['user_id'] = $penggunaan->user_id;
        $data['bulan'] = $penggunaan->bulan;
        $data['tahun'] = $penggunaan->tahun;
        $bulanan = $penggunaan->meter_akhir - $penggunaan->meter_awal;
        $total = $bulanan * $penggunaan->user->tarif->tarif_kwh;
        $data['jumlah_meter'] = $total;
        $data['status'] = 'Belum Bayar';
        TagihanPelanggan::create($data);
        return back()->with('success', 'Tambah Data Tagihan Sukses!, Silahkan Cek Tagihan Anda');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TagihanPelanggan  $tagihanPelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(TagihanPelanggan $tagihanPelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TagihanPelanggan  $tagihanPelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(TagihanPelanggan $tagihanPelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TagihanPelanggan  $tagihanPelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TagihanPelanggan $tagihanPelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TagihanPelanggan  $tagihanPelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TagihanPelanggan $tagihanPelanggan)
    {
        //
    }
}