<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrders;
use Illuminate\Support\Facades\Validator;

class DetailOrdersController extends Controller
{
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'id_order' => 'required',
                'id_product' => 'required',
                'qty' => 'required',
                'subtotal' => 'required'
            ]
        );

        if($validator->fails()){
            return Response()->json ($validator->errors());
        }

        $simpan = DetailOrders::create([
            'id_order' => $request->id_order,
            'id_product' => $request->id_product,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal
        ]);

        if($simpan) {
            return Response()->json(['status' => 1]);
        }
        else {
            return Response()->json(['statur' => 0]);
        }
    }

}