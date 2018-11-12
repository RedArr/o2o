<?php

namespace app\common\model;

use think\Model;

class Category extends Model
{
    public function add($data)
    {
        $data['status'] = 1;
        return $this->save($data);
    }

    public function getNormalFirstCategory(){
        $data = [
            'status' => 1,
            'parent_id' =>0,
        ];
        $order = [
            'id' => 'desc'
        ];

        return $this->where($data)
                    ->order($order)
                    ->select();
    }

    public function getFirstCategory($parentId = 0){
        $data = [
            'parent_id' => $parentId,
            'status' => ['neq',-1],
        ];

        $order = [
            'listorder'=>'desc',
            'id'=>'desc',
        ];

        $result = $this->where($data)
                    ->order($order)
                    ->paginate();
        return $result;
    }

    public function getNormalCategorysByParentId($parent_id = 0){
        $data = [
            'status' => 1,
            'parent_id' => $parent_id,
        ];

        $order = [
            'id' => 'desc',
        ];

        return $this->where($data)
            ->order($order)
            ->select();
    }
}