<?php

namespace app\api\controller;

use think\Controller;

class City extends Controller
{
    private $obj;

    public function _initialize()
    {
        return $this->obj = model("City");
    }

    public function getCitysByparentId()
    {
        $id = input('post.id');
        if (!$id){
            $this->error('id参数错误');
        }
        //通过ID获取二级城市
        $city = $this->obj->getNormalCitysByParentId($id);
        if (!$city){
            return show(0,'error');
        }
        return show(1,'success' , $city);

    }
}
