<?php
/**
 * Author sam
 * DateTime 2019-09-26 18:25
 * Description:
 */

namespace App\Tools;


use GuzzleHttp\Client;

class Notice
{
    const WX_URI = 'https://qyapi.weixin.qq.com/';
    const WX_URL = 'cgi-bin/webhook/send?key=f64e0dc8-a33c-47b5-a514-aad78fd5f88a';

    /**
     * Author sam
     * DateTime 2019-09-26 18:40
     * Description:发送消息到企业微信
     * @param $msg
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function wxSend($msg)
    {
        $postData = [
            'msgtype'=>'text',
            'text'=>[
                'content'=>$msg,
                'mentioned_list'=>'@all',
            ],
        ];
        $postData = json_encode($postData,JSON_UNESCAPED_UNICODE);
        $client = new Client(['base_uri'=>self::WX_URI,'time_out'=>5.0]);
        $client->request('POST',self::WX_URL,['headers'=>['Content-Type'=>'applications/json;charset=utf-8'],'body'=>$postData,'verify'=>false]);
    }
}
