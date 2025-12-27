<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $e)
{
    if ($request->is('api/*')) {
        // Handle specific errors
        if ($e instanceof \Illuminate\Validation\ValidationException) {
            $status = 422;
            $message = 'Validation failed.';
            $errors = $e->errors();
        } elseif ($e instanceof \Illuminate\Auth\AuthenticationException) {
            $status = 401;
            $message = 'Unauthenticated.';
        } elseif ($e instanceof \Illuminate\Auth\Access\AuthorizationException) {
            $status = 403;
            $message = 'Forbidden.';
        } elseif ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            $status = 404;
            $message = 'Resource not found.';
        } elseif ($e instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            $status = 405;
            $message = 'Method not allowed.';
        } else {
            $status = 500;
            $message = 'Server Error';
            $errors = ['error' => $e->getMessage()];
        }

        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors ?? []
        ], $status);
    }

    return parent::render($request, $e);
}
}
