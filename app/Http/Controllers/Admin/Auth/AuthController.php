<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Author sam
     * DateTime 2019-05-30 16:23
     * Description:登录获取token
     * @param LoginRequest $request
     * @param Hasher $hasher
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request,Hasher $hasher)
    {
        $credentials = [
            'account'=>$request->get('account'),
            'password'=>$request->get('password'),
        ];
        if (! $token = auth('admin')->attempt($credentials)) {
            return error('账号或密码不正确',401);
        }
        $response = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('admin')->factory()->getTTL() * 60
        ];
        return success($response);
    }

    /**
     * Author sam
     * DateTime 2019-05-23 15:06
     * Description:登出注销token
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('admin')->logout();
        return success();
    }
}
