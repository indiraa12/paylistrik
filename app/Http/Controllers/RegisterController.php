<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register()
    {
        return view("register.register", [
            "title" => "Register",
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
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
            // "id_tarif" => "required",
        ]);

        $validateData["password"] = bcrypt($validateData["password"]);

        User::create($validateData);

        return redirect("/login")->with(
            "success",
            "Registration Succes!! Login Now!"
        );
    }
}
