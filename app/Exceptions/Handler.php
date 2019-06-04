<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
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
     * Author sam
     * DateTime 2019-05-30 13:52
     * Description:把异常传入基类处理方法
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Author sam
     * DateTime 2019-05-30 13:53
     * Description:拦截异常
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        if (
            $exception instanceof AuthenticationException
            ||
            $exception instanceof UnauthorizedHttpException
            ||
            $exception instanceof ModelNotFoundException
            ||
            $exception instanceof ThrottleRequestsException
            ||
            $exception instanceof GeneralException
            ||
            $exception instanceof ValidationException
            ||
            $exception instanceof NotFoundHttpException
        ) {
            /**
             * 主动抛出的异常
             */
            if ($exception instanceof GeneralException) {
                return error($exception->getMessage());
            }

            /**
             * 模型404异常
             */
            if ($exception instanceof ModelNotFoundException) {
                return notFound('资源不存在');
            }

            /**
             * 路由404异常
             */
            if ($exception instanceof NotFoundHttpException) {
                return notFound('路由不存在');
            }

            /**
             * 认证异常
             */
            if ($exception instanceof AuthenticationException) {
                return unAuthorized();
            }

            /**
             * token失效异常
             */
            if ($exception instanceof UnauthorizedHttpException) {
                return unAuthorized();
            }

            /**
             * 请求超频异常
             */
            if($exception instanceof ThrottleRequestsException) {
                return error('请求次数太频繁');
            }

            /**
             * 参数错误异常
             */
            if($exception instanceof ValidationException){
                return error(Arr::first(Arr::collapse($exception->errors())),422);
            }
        }else{
            $app = App::environment();
            if($app != 'local'){
                return error('服务器错误',500);
            }
        }

        return parent::render($request, $exception);
    }
}
