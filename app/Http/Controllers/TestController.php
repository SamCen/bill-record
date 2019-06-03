<?php

namespace App\Http\Controllers;

use App\Contract\RedisKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $redisKey = RedisKey::ADMIN_PRIVILEGES;
        Redis::hset($redisKey,99,json_encode([123,456]));
        Redis::expire($redisKey,86400);
        return 123;
    }
}
