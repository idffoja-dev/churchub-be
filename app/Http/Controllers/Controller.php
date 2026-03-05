<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    protected function successResponse($data = null, $message = 'Success', $statusCode = Response::HTTP_OK)
    {
        return response()->json(
            $this->response(data: $data, message: $message),
            $statusCode
        );
    }

    protected function errorResponse($message = 'Error', $errors = null, $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json(
            $this->response(success: false, message: $message, errors: $errors),
            $statusCode
        );
    }

    protected function response($success = true, $data = null, $message = null, $errors = null)
    {
        return [
            'success' => $success,
            'message' => $message,
            'data' => $data,
            'errors' => $errors,
        ];
    }
}
