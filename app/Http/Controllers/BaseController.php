<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

/**
    @OA\Info(
        description="",
        version="1.0.0",
        title="MBK API",
    ),

    @OA\SecurityScheme(
      securityScheme="bearerAuth",
      type="http",
      scheme="bearer"
  )
 */
class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error = [], $errorMessages = '9999', $code = 400)
    {
    	$response = [
            'success' => false,
            'message' => $errorMessages,
        ];

        if(!empty($error)){
            $response['data'] = $error;
        }

        return response()->json($response, $code);
    }

    /**
     * return response .
     *
     * @return \Illuminate\Http\Response
     */
    public function sendDeleted($errorMessages = '9999')
    {
    	$response = [
            'success' => true,
            'message' => $errorMessages
        ];

        return response()->json($response, 204);
    }

    /**
     * return response .
     *
     * @return \Illuminate\Http\Response
     */
    public function sendCreated($result, $errorMessages = '9999')
    {
    	$response = [
            'success' => true,
            'data' => $result,
            'message' => $errorMessages,
        ];

        return response()->json($response, 201);
    }
}
