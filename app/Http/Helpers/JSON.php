<?php 

namespace App\Http\Helpers;

class JSON {

    public static function error($messages, $data = [], $status_code = 400) {
        return response()->json([
            'errors'        => $messages,
            'data'          => $data,
            'status_code'   => $status_code,
        ], $status_code);
    }

    public static function success($messages, $data, $status_code = 200) {
        return response()->json([
            'success'       => $messages,
            'data'          => $data,
            'status_code'   => $status_code,
        ], $status_code);
    } 

}