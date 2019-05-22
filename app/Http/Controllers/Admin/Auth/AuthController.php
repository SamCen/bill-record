<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = [
            $request->get('account'),
            $request->get('password'),
        ];
    }

    public function logout(Request $request)
    {

    }
}
