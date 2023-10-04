<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseGet($data, $code = null)
    {
        if (!empty($data)) {
            $statusCode = is_null($code) ? 200 : $code;
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil melihat data',
                'data' => $data,
            ], $statusCode);
        } else {
            $statusCode = is_null($code) ? 404 : $code;
            return response()->json([
                'status' => 'success',
                'message' => 'Data tidak ditemukan',
                'data' => $data
            ], $statusCode);
        }
    }

    public function responsePost($data, $code = 201)
    {
        switch ($code) {
            case 201:
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil menambahkan data!',
                    'data'  => $data,
                ], 201);
            case 500:
                return response()->json([
                    'status' => 'success',
                    'message' => 'Gagal menambahkan data!',
                    'data'  => $data,
                ], 500);
        }
    }

    public function responsePatch($data, $code = 200)
    {
        switch ($code) {
            case 200:
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil mengupdate data!',
                    'data'  => $data,
                ], 200);
            case 404:
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data tidak ditemukan'
                ], 404);
            case 500:
                return response()->json([
                    'status' => 'success',
                    'message' => 'Gagal mengupdate data!',
                    'data'  => $data,
                ], 500);
        }
    }

    public function http()
    {
        $token = Auth::user()->jwt_token;
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
        ]);
    }

    public function responseFailed($th, $message = null, $code = 500)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message ?: $th->getMessage(),
        ], $code);
    }

    public function responseDelete($data)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus data',
            // 'data' => $data
        ], 200);
    }
}
