<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Exception;

class VehicleController extends Controller
{
    private $api;

    public function __construct(){
        $this->middleware('auth:api');
        $this->api = env("API_STARWARS", "");
    }

    # Obtiene una colección de registros.
    public function get($page = 1){
        try {

            $response = Http::get($this->api . "/vehicles?page=" . $page);

            if(!$response->successful()) throw new Exception();

            $result = $response->object();

            return response()->json([
                "success" => true,
                "response" => $result
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "response" => $e->getCode() ? $e->getMessage() : "La solicitud no pudo ser procesada. "
            ], 404);
        }
    }

    # Obtiene un registro especifico en base a su Id.
    public function getById($id){
        try {

            $response = Http::get($this->api . "/vehicles/" . $id);

            if(!$response->successful()) throw new Exception();

            $result = $response->object();

            return response()->json([
                "success" => true,
                "response" => $result
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "response" => $e->getCode() ? $e->getMessage() : "La solicitud no pudo ser procesada. "
            ], 404);
        }
    }
}
