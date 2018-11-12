<?php
    function show ($status, $message ='' , $data = []){
        return [
            'status' => $status,
            'msg' => $message,
            'data' => $data
        ];
    }