<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Arr;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
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
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Throwable $exception)
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
    public function render($request, Throwable $exception)
    {
        if($this->isHttpException($exception)){
            if(view()->exists('errors.'.$exception->getStatusCode())){
                return response()->view('errors.'.$exception->getStatusCode(),[],$exception->getStatusCode());
            }
        }

        return parent::render($request, $exception);
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
 
        $guard = Arr::get($exception->guards(),0);
        $url = 'login';
        //using switch statement to switch between the guards
        switch ($guard) {
            case 'role:admin':
                $login = $url;
                break;
            case 'role:superadmin':
                $login = $url;
                break;
            case 'role:teacher':
                $login = $url;
                break;
            case 'role:student':
                $login = $url;
                break;
            case 'role:subordinate':
                $login = $url;
                break;
            case 'role:parent':
                $login = $url;
                break;
            case 'role:accountant':
                $login = $url;
                break;
            case 'role:librarian':
                $login = $url;
                break;
            case 'role:matron':
                $login = $url;
                break;
            default:
                $login = $url;
                break;
        }
        return redirect()->guest(route($login));
    }

}
