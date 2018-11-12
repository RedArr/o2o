<?php
namespace app\bis\controller;

use think\Controller;

class Register extends Controller
{
    public function Index(){
        $citys = model('City')->getNormalCitysByParentID();
        $categorys = model('Category')->getNormalCategorysByParentId();
        return $this->fetch('',[
            'citys' => $citys,
            'categorys' => $categorys,
        ]);
    }
}