<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Penggunaan;
use App\Models\TagihanPelanggan;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bayar = Pembayaran::with('tagihan.user')->latest()->get();
        // return $bayar;
        return view('admin.pembayaran.index', compact('bayar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Pelanggan::all();
        return view('halaman.pembayaran.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'tagihan_id' => 'required',
                // 'user_id' => 'required|exists:users,id',
                'tanggal_pembayaran' => 'required',
                // 'biaya_admin' => 'required',
                'total_bayar' => 'required',
        ],[
                'tagihan_id.required' => 'Pelanggan harus diisi',
                // 'user_id.required' => 'Petugas harus diisi',
                'tanggal_pembayaran.required' => 'Tanggal pembayaran harus diisi',
                // 'biaya_admin.required' => 'Biaya admin harus diisi',
                'total_bayar.required' => 'Total bayar harus diisi',
        ]);
        $tagihan = TagihanPelanggan::with('penggunaan', 'user')->where('id', $request->tagihan_id)->first();
        // return $tagihan;
        $data = $request->all();
        // $data['user_id'] = $request->user_id;
        $data['tagihan_id'] = $request->tagihan_id;
        $data['biaya_admin'] = 2500;
        if ($data["total_bayar"] > $tagihan->jumlah_meter * $tagihan->user->tarif->tarif_kwh + $data['biaya_admin']){
            // return 'lebih';
            return back()->with('error', 'Uang yang anda masukkan lebih dari tagihan');
        }

        if ($data["total_bayar"] >= $tagihan->jumlah_meter * $tagihan->user->tarif->tarif_kwh + $data['biaya_admin']){
            // return 'lunas';
            $tagihan->status = 'Lunas';
            // return back()->with('success', 'Pembayaran tagihan berhasil di simpan!');
        }

        if ($data["total_bayar"] < $tagihan->jumlah_meter * $tagihan->user->tarif->tarif_kwh + $data['biaya_admin']){
            // return 'kurang';
            return back()->with('error', 'Uang yang anda masukkan kurang dari tagihan');
        }

        $tagihan->save();
        Pembayaran::create($data);
        return back()->with('success', 'Pembayaran tagihan berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $data = $request->all();
        $data['id_pembayaran'] = $request->id_pembayaran;
        $pembayaran->update($data);
        return redirect('/admin/penggunaan')->with('berhasil', 'Edit Data Sukses!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}