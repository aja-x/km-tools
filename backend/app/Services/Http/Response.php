<?php


namespace App\Services\Http;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Response
{
    public static function plain($messages, $status = 200)
    {
        return response()->json($messages, $status);
    }

    public static function view($data)
    {
        if (!$data)
            return self::plain(['message' => 'Error while getting data'], 400);
        else
            return self::plain(['data' => $data], 200);
    }

    public static function success($data, $status = 200)
    {
        if (!$data)
            return self::plain(['message' => 'Error while managing data'], 400);
        else
            return self::plain(['message' => 'Success', 'data' => $data], $status);
    }
}
