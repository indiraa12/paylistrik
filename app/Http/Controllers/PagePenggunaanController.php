<?php

namespace App\Http\Controllers;

use App\Models\Penggunaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\TagihanPelanggan;
use App\Models\User;

class PagePenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_penggunaan = Penggunaan::with('User')->latest()->get();
        // return $data_penggunaan;
        return view('admin.penggunaan.usage', compact('data_penggunaan'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = range(date("Y"), date("Y") - 5);
        $namaBulan = [];
        for ($i = 1; $i <= 12; $i++) {
            $namaBulan[] = date("F", mktime(0, 0, 0, $i, 1));
        }
        // return $namaBulan;
        $users = User::where('role_id', 2)->get();
        return view('admin.penggunaan.tambah', compact('users', 'years', 'namaBulan'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user_id;
        Penggunaan::create($data);
        return redirect('/admin/penggunaan')->with('success', 'Tambah Data Sukses!!!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penggunaan  $penggunaan
     * @return \Illuminate\Http\Response
     */
    public function show(Penggunaan $penggunaan)
    {
        // return $penggunaan;
        $bulanan = $penggunaan->meter_akhir - $penggunaan->meter_awal;
        $total = $bulanan * $penggunaan->user->tarif->tarif_kwh;
        return view('admin.penggunaan.detail', compact('penggunaan', 'total'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penggunaan  $penggunaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penggunaan $penggunaan)
    {
        $users = User::where('role_id', 2)->get();
        $penggunaan = Penggunaan::with('User')->first();
        return view("admin.penggunaan.update", compact("penggunaan", "users"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penggunaan  $penggunaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penggunaan $penggunaan)
    {
        $data = $request->all();
        $data['id_penggunaan'] = $request->id_penggunaan;
        $penggunaan->update($data);
        return redirect('/admin/penggunaan')->with('berhasil', 'Edit Data Sukses!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penggunaan  $penggunaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penggunaan $penggunaan)
    { {

            $penggunaan->delete();
            return redirect('/admin/penggunaan')->with('hapus', 'Hapus Data Sukses!!!');
        }
    }
}
