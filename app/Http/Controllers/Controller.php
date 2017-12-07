<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
	/**
	 * Send success response
	 */
    public function success($data, $code){
        return response()->json(['data' => $data], $code);
    }

    /**
     * Send error message
     */
    public function error($message, $code){
        return response()->json(['message' => $message], $code);
    }
}
