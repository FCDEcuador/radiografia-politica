<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\Access\AuthorizationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ApiResponseException)
        {

            $response = [
                'status' => false,
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
                'errors' => $exception->errors
            ];

            if (config('app.debug'))
            {
                $response['exception'] = get_class($exception);
                $response['trace'] = $exception->getTrace();
            }

            $status = 400;

            if($this->isHttpException($exception))
            {
                $status = $exception->getStatusCode();
            }

            return response()->json(['result' => $response],$status);

        }else if($exception instanceof AuthorizationException)
        {
            if($request->all()["_method"] != "delete")
            {
              if($exception->getMessage() == "This action is unauthorized.")
              {
                return response()->view('errors.403');
              }else {
                return parent::render($request, $exception);
              }
            }else {
              return response()->json(['sucess' => false, 'message' => "Not authorized."],403);
            }

        }else {
            return parent::render($request, $exception);

        }

    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest('login');
    }
}
