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
            $returnData = $this->paginationTransform($dataArray);
        }else{
            $returnData = (is_array($data)) ? $data : ['data' => $data];
        }

        $returnData['status'] = $code;
        $returnData['success'] = true;

        return response()->json($returnData, $code);
    } // success

    /**
     * Send error message
     */
    public function error($message, $code = 422){
        return response()->json([
            'success' => false,
            'status' => $code,
            'message' => $message,
        ], $code);
    }

    /**
     * Pagination transform
     */
    public function paginationTransform($dataArray)
    {
        return [
            'items' => $dataArray['data'],
            'pagination' => [
                'current_page' => $dataArray['current_page'],
                // 'from' => $dataArray['from'],
                'last_page' => $dataArray['last_page'],
                'per_page' => $dataArray['per_page'],
                // 'to' => $dataArray['to'],
                'total' => $dataArray['total'],
                'first_page_url' => $dataArray['first_page_url'],
                'last_page_url' => $dataArray['last_page_url'],
                'next_page_url' => $dataArray['next_page_url'],
                'prev_page_url' => $dataArray['prev_page_url'],
            ]
        ];
    } // paginationTransform



}
