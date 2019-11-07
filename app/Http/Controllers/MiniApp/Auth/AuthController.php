<?php

namespace App\Http\Controllers\MiniApp\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'mobile'=>$request->get('mobile'),
            'password'=>$request->get('password'),
        ];
        if (! $token = auth('app')->attempt($credentials)) {
            return error('账号或密码不正确',401);
        }
        /**
         * @var $user  User
         */
        $user = Auth::guard('app')->user();
        $user->last_login_ip = !empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:'127.0.0.1';
        $user->save();
        $response = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('admin')->factory()->getTTL() * 60
        ];
        return success($response);
    }

    /**
     * Author sam
     * DateTime 2019-11-01 10:57
     * Description:登出注销token
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('app')->logout();
        return success();
    }
}
