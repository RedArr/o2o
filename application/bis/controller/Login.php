<?php
namespace app\bis\controller;

use think\Controller;

class Login extends Controller
{
    public function Index(){
        return $this->fetch();
    }
}