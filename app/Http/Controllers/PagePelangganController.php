<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tarif;
use App\Models\User;

class PagePelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->cari) {
            $data_pelanggan = User::with('tarif')
            ->where("role_id", 2)
                ->where("username", "LIKE", "%" . $request->cari . "%")
                ->latest()
                ->get();
        } else {
            $data_pelanggan = User::with('tarif')
            ->where("role_id", 2)
                ->latest()
                ->get();
            // return $data_pelanggan;
        }
        return view("admin.pelanggan.index", compact("data_pelanggan"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarif = Tarif::all();
        return view("admin.pelanggan.create", compact("tarif"));
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
            "username" => [
                "required",
                "min:3",
                "max:30",
                "unique:users,username",
            ],
            "password" => "required",
            "min:5",
            "max:20",
            "nomor_kwh" => "required",
            "name" => "required",
            "alamat" => "required",
            "tarif_id" => "required",
        ]);
        $pelanggan = $request->all();
        $pelanggan["tarif_id"] = $request->tarif_id;
        $pelanggan["password"] = bcrypt($pelanggan["password"]);
        User::create($pelanggan);
        return redirect("/admin/pelanggan")->with(
            "success",
            "Tambah Data Sukses!!!"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(User $pelanggan)
    {
        return view("admin.pelanggan.edit", compact("pelanggan"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */

    public function edit(User $pelanggan)
    {
        $tarif = Tarif::all();
        // return $tarif;
        return view("admin.pelanggan.edit", compact("pelanggan", "tarif"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pelanggan)
    {
        $request->validate([
            "name" => "required",
            "username" => [
                "required",
                "min:3",
                "max:30",
                "unique:users,username," . $pelanggan->id,
            ],
            "password" => "nullable|min:5|max:20",
            "nomor_kwh" => "required",
            "name" => "required",
            "alamat" => "required",
            "tarif_id" => "required",
        ]);
        $data = $request->all();
        $data["tarif_id"] = $request->tarif_id;
        if ($request->password) {
            $data["password"] = bcrypt($data["password"]);
        } else {
            unset($data["password"]);
        }
        $pelanggan->update($data);
        return redirect("/admin/pelanggan")->with(
            "berhasil",
            "Edit Data Sukses!!!"
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $pelanggan)
    {
        $pelanggan->delete();
        return redirect("/admin/pelanggan")->with(
            "hapus",
            "Hapus Data Sukses!!!"
        );
    }
}
