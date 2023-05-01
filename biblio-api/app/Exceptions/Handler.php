<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'password',
        'current_password',
        'password_confirmation',
    ];

    public function render($request, Exception|Throwable $exception)
    {
        if ($exception instanceof \Illuminate\Http\Exceptions\HttpResponseException) {
            return $exception->getResponse();
        }

        $statusCode = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
        $message = $exception->getMessage() ?? 'Internal server error';

        $response = [
            'message' => $message,
            'status' => $statusCode,
        ];

        if ($exception instanceof ValidationException) {
            $response['errors'] = $exception->errors();
        } else {
            $response['trace'] = $exception->getTraceAsString();
        }

        return new JsonResponse($response, $statusCode);
    }
}
