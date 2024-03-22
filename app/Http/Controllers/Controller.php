<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function successResponse($data = null, int $status = 200, $message = null , $meta = null)
    {
        return response()->json([
            'status' => true,
            "data" => $data,
            "message" => $message,
            "meta" => $meta,
        ], $status);
    }

    public function errorResponse($message = null, int $status = 400, $data = null , $meta = null)
    {
        return response()->json([
            'status' => false,
            "data" => $data,
            "message" => $message,
            "meta" => $meta,
        ], $status);
    }
}
