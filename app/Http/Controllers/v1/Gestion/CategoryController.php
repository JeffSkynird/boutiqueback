<?php

namespace App\Http\Controllers\v1\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\ChecService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $data = Category::all();
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
            $res = $checService->saveCategory([
                "slug" => $request->input('name'),
                "name" => $request->input('name'),
                "description" => $request->input('description'),
            ]);
            $request['chec_id'] = $res->id;
            $request['auditor'] = "admin";
            Category::create($request->all());
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
        $data = Category::find($id);
        return json_encode([
            "status" => "200",
            "message" => 'Datos obtenidos con éxito',
            "data" => $data,
            "type" => 'success'
        ]);
    }
    public function update(Request $request,ChecService $checService,$id){
        try {
            $co = Category::find($id);
            $co->update($request->all());
            //CHEC SERVICE
            $checService->editCategory($co->chec_id,$request->all());
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
        $data = Category::find($id);
        //CHEC SERVICE
        $checService->deleteCategory($data->chec_id);
        $data->delete();

        return json_encode([
            "status" => "200",
            "message" => 'Eliminación exitosa',
            "type" => 'success'
        ]);
    }
}
