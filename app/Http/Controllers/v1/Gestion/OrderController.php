<?php

namespace App\Http\Controllers\v1\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\ChecService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(ChecService $checService)
    {
        try {
            //GET ALL ORDERS FROM CHEC IO
            $res = $checService->getOrders();
            $data = $res->data;
          
            return json_encode([
                "status" => "200",
                'data'=>$data,
                "message" => 'Data obtenida con éxito',
                "type" => 'success'
            ]);
        } catch (\Exception $e) {
            return json_encode([
                "status" => "500",
                "message" => $e->getMessage(),
                "type" => 'error'
            ]);
        }
    }
    public function create(Request $request,ChecService $checService)
    {
        try {
            //CREATE IN CHEC IO
            $res = $checService->saveDiscount([
                "code" => $request->input('code'),
                'type'=>'fixed',
                'value'=>$request->input('value'),
                'limit_quantity'=>true,
                'quantity'=>$request->input('quantity'),
                'expires'=>false
            ]);
            $request['chec_id'] = $res->id;
            $request['auditor'] = "admin";
            Order::create($request->all());
            return json_encode([
                "status" => "200",
                "message" => 'Registro exitoso',
                "type" => 'success'
            ]);
        } catch (\Exception $e) {
            return json_encode([
                "status" => "500",
                "message" => $e->getMessage(),
                "type" => 'error'
            ]);
        }
    }
    public function show($id)
    {
        $data = Order::find($id);
        return json_encode([
            "status" => "200",
            "message" => 'Datos obtenidos con éxito',
            "data" => $data,
            "type" => 'success'
        ]);
    }
    public function update(Request $request,ChecService $checService,$id){
        try {
            $co = Order::find($id);
            $co->update($request->all());
            //CHEC SERVICE
            $checService->editDiscount($co->chec_id,$request->all());
            return json_encode([
                "status" => "200",
                "message" => 'Modificación exitosa',
                "type" => 'success'
            ]);
        } catch (\Exception $e) {
            return json_encode([
                "status" => "500",
                "message" => $e->getMessage(),
                "type" => 'error'
            ]);
        }
    }
  
    public function delete(ChecService $checService,$id)
    {
        $data = Order::find($id);
        //CHEC SERVICE
        $checService->deleteDiscount($data->chec_id);
        $data->delete();

        return json_encode([
            "status" => "200",
            "message" => 'Eliminación exitosa',
            "type" => 'success'
        ]);
    }
}
