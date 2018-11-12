<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function status ($status)
{
    if ($status == 1) {
        $str = "<span class = 'label label-success radius'>正常</span>";
    } elseif ($status == 0) {
        $str = "<span class = 'label label-danger radius'>待审核</span>";
    } elseif ($status == -1) {
        $str = "<span class = 'label label-danger radius'>删除</span>";
    }

    return $str;
}

function doCurl($url , $type = 0, $data = []){
    //初始化
    $ch = curl_init();
    //设置
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HEADER,0);
    //是否POST
    if ($type == 1){
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    }

    //执行获取内容
    $output = curl_exec($ch);

    //释放curl
    curl_close($ch);

    return $output;
}