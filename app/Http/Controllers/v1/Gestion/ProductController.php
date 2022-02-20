<?php

namespace App\Http\Controllers\v1\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ChecService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $data = Product::all();
            return json_encode([
                "status" => "200",
                'data' => $data,
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
    public function create(Request $request, ChecService $checService)
    {
        try {
            //SAVE IMAGE
            $res0 = null;
            if (!is_null($request->input('image'))) {
                $res0 = $checService->saveAsset([
                    "filename" => $request->input('sku'),
                    "private" => false,
                    "url" => $request->input('image'),
                ]);
            }
            //CREATE IN CHEC IO
            $data = [
                "product" => [
                    "name" => $request->input('name'),
                    'sku' => $request->input('sku'),
                    'price' => floatval($request->input('price')),
                    'description' => $request->input('description'),
                    'pay_what_you_want' => false,
                    'tax_exempt' => false,
                    "active" => true,
                    "sort_order" => 25,
                    "inventory" => [
                        "managed" => true,
                        "available" => $request->input('quantity'),
                    ],
                ],
                "categories" =>$request->input('categories')
               


            ];

            if (!is_null($request->input('image'))) {
                if ($res0 != null) {
                    $data['assets'] = [
                        [
                            "id" => $res0 != null ? $res0->id : null,
                            "sort_order" => 25
                        ]
                    ];
                }
            }
            $res = $checService->saveProduct($data);
          
            $request['chec_id'] = $res->id;
            $request['auditor'] = "admin";
            $request['stock'] = $request->input('quantity');
            Product::create($request->all());
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
        $data = Product::find($id);
        return json_encode([
            "status" => "200",
            "message" => 'Datos obtenidos con éxito',
            "data" => $data,
            "type" => 'success'
        ]);
    }
    public function update(Request $request, ChecService $checService, $id)
    {
        try {
            $co = Product::find($id);
            $co->update($request->all());
            //CHEC SERVICE
            $checService->editDiscount($co->chec_id, $request->all());
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

    public function delete(ChecService $checService, $id)
    {
        $data = Product::find($id);
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
