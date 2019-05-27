<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Author sam
     * DateTime 2019-05-23 15:06
     * Description:登录获取token
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            $request->get('account'),
            $request->get('password'),
        ];
        if (! $token = auth('admin')->attempt($credentials)) {
            return unAuthorized();
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
