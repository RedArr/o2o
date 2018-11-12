<?php

namespace app\admin\controller;

use think\Controller;

class Category extends Controller
{
    private $obj;

    public function _initialize()
    {
        return $this->obj = model("Category");
    }

    public function index()
    {
        $parentId = input('get.parent_id', 0, 'intval');
        $firstCategorys = $this->obj->getFirstCategory($parentId);
        return $this->fetch('', [
            'categorys' => $firstCategorys,
        ]);
    }

    public function add()
    {
        $categorys = $this->obj->getNormalFirstCategory();
        return $this->fetch('', [
            'categorys' => $categorys,
        ]);
    }

    //存储
    public function save()
    {
        /*
         * 做严格判断
         */
        if (!request()->isPost()) {
            return $this->error('提交方式不正确');
        }
        $data = input('post.');
        $validate = validate('Category');
        if (!$validate->scene('add')->check($data)) {
            $this->error($validate->getError());
        };

        if (!empty($data['id'])) {
            return $this->update($data);
        }

        $res = $this->obj->add($data);
        if ($res) {
            $this->success('新增成功');
        } else {
            $this->error('新增失败');
        }
    }

    //编辑页面
    public function edit($id = 0)
    {
        if (intval($id) < 1) {
            $this->error('参数不合法');
        }

        $category = $this->obj->get($id);

        $categorys = $this->obj->getNorMalFirstCategory();
        return $this->fetch('', [
            'categorys' => $categorys,
            'category' => $category,
        ]);
    }

    public function update($data)
    {
        $res = $this->obj->save($data, ['id' => intval($data['id'])]);
        if ($res) {
            return $this->success('更新成功');
        } else {
            return $this->error('更新失败');
        }
    }

    //排序逻辑
    public function listorder($id,$listorder){
       $res = $this->obj->save(['listorder'=>$listorder],['id'=>$id]);
       if ($res){
           $this->result($_SERVER['HTTP_REFERER'],1,'更新成功');
       }else{
           $this->result($_SERVER['HTTP_REFERER'],2,'更新错误');
       }
    }

    //修改状态
    public function status(){
        $data = input('get.');
        $validate = validate('Category');
        if (!$validate->scene('status')->check($data)){
            $this->error($validate->getError());
        }

        $res = $this->obj->save($data,['id'=>$data['id']]);

        if ($res){
            $this->success('状态更新成功');
        }else{
            $this->error('状态更新失败');
        }
    }

    public function test(){
        123;
    }
}
