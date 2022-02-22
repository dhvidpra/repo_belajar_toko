<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{

    public function show()
    {
        return Customers::all();
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama' => 'required',
                'alamat' => 'required',
                'telp' => 'required',
                'username' => 'required',
                'password' => 'required'
            ]
        );

        if($validator->fails()){
            return Response()->json ($validator->errors());
        }

        $simpan = Customers::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'username' => $request->username,
            'password' => $request->password
        ]);

        if($simpan) {
            return Response()->json(['status' => 1]);
        }
        else {
            return Response()->json(['statur' => 0]);
        }
    }

}