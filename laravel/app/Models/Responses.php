<?php

namespace App\Models;

class Responses
{
    public static function success($data)
    {
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    public static function reject($data)
    {
        return response()->json(['status' => false, 'data' => $data], 200);
    }

    public static function error($data)
    {
        return response()->json(['status' => false, 'data' => $data], 422);
    }
}
