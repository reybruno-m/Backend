<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Exception;

class PersonController extends Controller
{
    private $api;

    public function __construct(){
        $this->api = env("API_STARWARS", "");
    }

    # Obtiene una colección de registros.
    public function get(){
        try {

            $response = Http::get($this->api . "/people");

            if(!$response->successful()) throw new Exception("");

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

            $response = Http::get($this->api . "/people/" . $id);

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
