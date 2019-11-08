<?php

namespace App\Services\Http;

class Response
{
    public static function plain($messages, $status = 200)
    {
        return response()->json($messages, $status);
    }

    public static function view($data)
    {
        if ($data)
            return self::plain(['data' => $data], 200);
        else
            return self::plain(['message' => 'Error while getting data'], 400);
    }

    public static function success($data, $status = 200)
    {
        if ($data)
            return self::plain(['message' => 'Success', 'data' => $data], $status);
        else
            return self::plain(['message' => 'Error while managing data'], 400);
    }

    public static function tryResponse($data)
    {
        try
        {
            $data;
        }
        catch (\Exception $exception)
        {

        }
    }
}
