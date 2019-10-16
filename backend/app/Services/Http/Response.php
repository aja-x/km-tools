<?php


namespace App\Services\Http;


class Response
{
    public static function returnResponse($header, $messages, $status)
    {
        return response()->json([
            $header => $messages,
        ], $status);
    }
}
