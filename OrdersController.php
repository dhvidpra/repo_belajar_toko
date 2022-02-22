<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{

    public function show()
    {
        $data_orders = Orders::join('Customers', 'customers.id_customers]', 'orders.id_order')->get();
        return Response()->json($data_orders);
    }

    public function detail($id_order)
    {
        if(Orders::where('id', $id_customer)->exist()){
            $data_orders = Orders::join('Customers', 'customers.id_customer', 'orders.id_order')
            ->where('order.id', '=', $id_customer)
            ->get();

            return Response()->json($data_orders);
        }
        else {
            return Response()->json(['message' => 'Tidak ditemukan']);
        }
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'id_customer' => 'required',
                'tgl_order' => 'required'
            ]
        );

        if($validator->fails()){
            return Response()->json ($validator->errors());
        }

        $simpan = Orders::create([
            'id_customer' => $request->id_customer,
            'tgl_order' => $request->tgl_order
        ]);

        if($simpan) {
            return Response()->json(['status' => 1]);
        }
        else {
            return Response()->json(['statur' => 0]);
        }
    }

}