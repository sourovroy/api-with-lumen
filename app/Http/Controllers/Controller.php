<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
	/**
	 * Send success response
	 */
    public function success($data, $code = 200){
        $returnData = [];
        if(is_object($data) && is_a($data, 'Illuminate\Pagination\LengthAwarePaginator')){
            $dataArray = $data->toArray();
            $returnData = $this->paginationTransform($dataArray, $code);
        }else{
            $returnData = $data;
        }

        if(isset($returnData['status'])){
            $code = $returnData['status'];
        }

        return response()->json($returnData, $code);
    }

    /**
     * Send error message
     */
    public function error($message, $code){
        return response()->json([
            'success' => false,
            'status' => $code,
            'message' => $message,
        ], $code);
    }

    /**
     * Pagination transform
     */
    public function paginationTransform($dataArray, $code)
    {
        return [
            'items' => $dataArray['data'],
            'pagination' => [
                'current_page' => $dataArray['current_page'],
                'from' => $dataArray['from'],
                'last_page' => $dataArray['last_page'],
                'per_page' => $dataArray['per_page'],
                'to' => $dataArray['to'],
                'total' => $dataArray['total'],
                'first_page_url' => $dataArray['first_page_url'],
                'last_page_url' => $dataArray['last_page_url'],
                'next_page_url' => $dataArray['next_page_url'],
                'prev_page_url' => $dataArray['prev_page_url'],
            ],
            'success' => true,
            'status' => $code,
        ];
    }



}
