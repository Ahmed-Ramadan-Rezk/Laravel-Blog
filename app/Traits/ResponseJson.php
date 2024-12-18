<?php

namespace App\Traits;

trait ResponseJson
{
    public function sendResponse(string $message = '', bool $success = true, $data = [], int $code = 200)
    {
        return response()->json([
            'message' => $message,
            'success' => $success,
            'data' => $data
        ], $code);
    }
}
