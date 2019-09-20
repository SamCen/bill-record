<?php
/**
 * Author sam
 * DateTime 2019-06-04 11:21
 * Description:
 */

namespace App\Tools;


use App\Exceptions\GeneralException;
use Illuminate\Support\Collection;

class Tree
{
    /**
     * Author sam
     * DateTime 2019-06-04 11:28
     * Description:递归生成树状结构
     * @param $data
     * @param int $pid
     * @param string $priKey
     * @param string $parentKey
     * @param string $childKey
     * @return array
     */
    public static function getTree($data,$pid = 'base',$priKey = 'code',$parentKey = 'parent_code',$childKey = 'children')
    {
        $tree = array();
        foreach ($data as $k => $v){
            if($v[$parentKey] == $pid){
                $v[$childKey] = self::getTree($data,$v[$priKey],$priKey,$parentKey,$childKey)?:null;
                $tree[] = $v;
            }
        }
        return $tree;
    }

    public static function format($data)
    {
        if ($data instanceof Collection) {
            return $data;
        }

        if (is_array($data)) {
            return collect($data);
        }
        throw new GeneralException('数据类型错误');
    }
}
