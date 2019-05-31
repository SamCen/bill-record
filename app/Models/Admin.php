<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
    protected $fillable = [
        'account','password','last_login_ip','status'
    ];

    /**
     * Author sam
     * DateTime 2019-05-22 17:19
     * Description:设置密码加密
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Author samcen
     * DateTime 2019-05-30 21:37
     * Description:IP地址入库转整形
     * @param $value
     */
    public function setLastLoginIpAttribute($value)
    {
        $this->attributes['last_login_ip'] = ip2long($value);
    }

    /**
     * Author samcen
     * DateTime 2019-05-30 21:40
     * Description:ip地址出库转ip格式
     * @return string
     */
    public function getLastLoginIpAttribute()
    {
        return long2ip($this->last_login_ip);
    }
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
