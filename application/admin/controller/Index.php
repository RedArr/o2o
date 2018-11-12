<?php

namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function map()
    {
        return \Map::staticimage('香山南路19号院');
    }

    public function welcome()
    {
        return '发送成功';
    }
}
