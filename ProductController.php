<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_product' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
                'foto_product' => 'required'
            ]
        );

        if($validator->fails()){
            return Response()->json ($validator->errors());
        }

        $simpan = Product::create([
            'nama_product' => $request->nama_product,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto_product' => $request->foto_product
        ]);

        if($simpan) {
            return Response()->json(['status' => 1]);
        }
        else {
            return Response()->json(['statur' => 0]);
        }
    }

}