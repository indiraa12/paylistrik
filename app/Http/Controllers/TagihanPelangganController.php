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
        $tagihan = TagihanPelanggan::with('penggunaan', 'user')->latest()->get();
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
        // $total = $bulanan * $penggunaan->user->tarif->tarif_kwh;
        $data['jumlah_meter'] = $bulanan;
        $data['status'] = 'Belum Bayar';
        TagihanPelanggan::create($data);
        return back()->with('success', 'Tambah Data Tagihan Sukses!, Silahkan Cek Tagihan Anda');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(TagihanPelanggan $tagihan)
    {
        $tagihan = TagihanPelanggan::with('penggunaan', 'user')->where('id', $tagihan->id)->first();
        // return $tagihan;
        return view("admin.tagihan.show", compact("tagihan"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(TagihanPelanggan $tagihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TagihanPelanggan $tagihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(TagihanPelanggan $tagihan)
    {
        // $tagihanPelanggan->delete();
        return redirect("/admin/tagihan")->with(
            "hapus",
            "Hapus Data Sukses!!!"
        );
    }
}
