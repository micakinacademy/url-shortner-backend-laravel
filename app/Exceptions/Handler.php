<?php

namespace App\Exceptions;

use App\Traits\JsonExceptionHandlerTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{

    use JsonExceptionHandlerTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (NotFoundHttpException $e) {
            return $this->routeNotFound();
        });

        $this->renderable(function (AuthenticationException $e) {
            return $this->unauthenticatedError($e);
        });

        $this->renderable(function (RequestException $e) {
            return $this->httpClientError($e);
        });

        $this->renderable(function (AuthorizationException $e) {
            return $this->authorizationError($e);
        });


        $this->renderable(function (RequestException $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('message', [
                    'status' => 'error',
                    'body'   => 'Something went wrong. Please try again',
                ]);
        });

        $this->renderable(function (TokenMismatchException $e) {
            return redirect()->back();
        });
    }
}
