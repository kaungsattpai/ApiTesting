<?php

namespace App\Response;

use Illuminate\Http\Responses;

trait responseTrait
{
    public function respondErrorToken($message){
        return response()->json([
            'status' => 'Fail',
            'status_code' => 400,
            'message' => $message
        ], 400);
    }

    public function responseForCreated($message){
        return response()->json([
            'status' => 'Success',
            'status_code' => 201,
            'message' => $message
        ],201);
    }

    public function responseForSuccessWithData($message, $data){
        return response()->json([
           'status' => 'Success',
           'status_code' => 201,
           'message' => $message,
           'data' => $data
        ], 201);
    }

    public function responseForError($message){
        return response()->json([
            'status' => 'Fail',
            'status_code' => 400,
            'message' => $message
        ],400);
    }

    public function responseForNotFound($message){
        return response()->json([
            'status' => 'Fail',
            'status_code' => 404,
            'message' => $message
        ], 404);
    }
}
