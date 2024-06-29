<?php

namespace App\Traits;
use Illuminate\Http\Response;

trait APIResponseTrait
{
     /**
     * Success response method.
     *
     * @param mixed  $data
     * @param string $message
     * @param int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $message = 'Success', $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * Error response method.
     *
     * @param string $message
     * @param int    $statusCode
     * @param mixed  $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $statusCode = 400, $errors = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $statusCode);
    }

    /**
     * Validation failure response method.
     *
     * @param mixed $errors
     * @param string $message
     * @param int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function validationFailureResponse($errors, $message = 'Validation Failed', $statusCode = 422)
    {
        return response()->json([
            'status' => 'fail',
            'message' => $message,
            'errors' => $errors,
        ], $statusCode);
    }

    /**
     * Simple success response method without data.
     *
     * @param string $message
     * @param int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function simpleSuccessResponse($message = 'Success', $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
        ], $statusCode);
    }

    /**
     * Simple error response method without detailed errors.
     *
     * @param string $message
     * @param int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function simpleErrorResponse($message = 'Error', $statusCode = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $statusCode);
    }
}