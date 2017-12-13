<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // Fatal Error
        if(is_a($e, 'Symfony\Component\Debug\Exception\FatalThrowableError')){
            header('Content-Type: application/json');
            http_response_code(500);
            die(json_encode([
                'success' => false,
                'status' => 500,
                'message' => 'Whoops, looks like something went wrong.'
            ]));
        }

        // Method Not Allowed
        if($e instanceof MethodNotAllowedHttpException){
            $code = $e->getStatusCode();
            return response()->json([
                'success' => false,
                'status' => $code,
                'message' => 'Sorry, method not allowed.'
            ], $code);
        }

        // Method Not Allowed
        if($e instanceof NotFoundHttpException){
            $code = $e->getStatusCode();
            return response()->json([
                'success' => false,
                'status' => $code,
                'message' => 'Sorry, the page you are looking for could not be found.'
            ], $code);
        }

        return parent::render($request, $e);
    }



}
