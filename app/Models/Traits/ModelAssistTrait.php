<?php
/**
 * Author sam
 * DateTime 2019-06-10 15:33
 * Description:
 */

namespace App\Models\Traits;


Trait ModelAssistTrait
{
    public function updateLogic($data)
    {
        foreach ($data as $key => $val){
            $this->$key = $val;
        }
        $this->save();
    }
}
